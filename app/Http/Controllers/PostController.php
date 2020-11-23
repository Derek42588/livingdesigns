<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
            $posts->fromTag = 'true';
            $posts->tag = request('tag');

            foreach($posts as $post) {
                $blurb = explode(' ', $post->body, 20);
                $blurb = array_slice($blurb, 0, 19);
                $blurb = implode(' ', $blurb);
                $post->blurb = $blurb;
                $date = strtotime($post->published_at);
                $date = date('M d Y', $date);
                $post->formattedDate = $date;
            }

        } else {
            $posts = Post::latest()->paginate(6);
            $posts->fromTag = 'false';

            foreach($posts as $post) {
                $blurb = explode(' ', $post->body, 20);
                $blurb = array_slice($blurb, 0, 19);
                $blurb = implode(' ', $blurb);
                $post->blurb = $blurb;
                $date = strtotime($post->published_at);
                $date = date('M d Y', $date);
                $post->formattedDate = $date;
            }

        }
        return view('blog.all', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('blog.create', [
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validatePost();
        $parsedTags = request('tags');

        $parsedTags = explode(', ', $parsedTags);
        $parsedTags = array_unique($parsedTags);

        $post = new Post(request(['title', 'body']));

        $articleSlug = request('title');
        $articleSlug = explode(' ', $articleSlug);
        $articleSlug =  array_slice($articleSlug, 0,3);
        $articleSlug = implode('-', $articleSlug);


        $post->user_id = Auth::user()->id;
        $post->slug = $articleSlug;
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->imageLink) {
            $post->imageLink = $request->imageLink;

        }
        if ($request->imageAlt) {
            $post->imageAlt = $request->imageAlt;

        }
        $post->save();

        $newParsedTags = [];
        if (count($parsedTags) > 0) {

            foreach ($parsedTags as $tag) {
                if ($tag !== '') {
                    if (Tag::where('name', $tag)->exists()) {
                        $fetchTag = Tag::where('name', $tag)->first();
                        array_push($newParsedTags, $fetchTag->id);

                    } else {
                        $newTag = new Tag;
                        $newTag->name = $tag;
                        $newTag->save();
                        array_push($newParsedTags, $newTag->id);

                    }
                }

            }
            $post->tags()->attach($newParsedTags);

        }

//        Post::create([
//            'user_id' => 1,
//            'title'=>request('title'),
//            'body'=>request('body'),
//            'slug'=>$articleSlug
//        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $date = strtotime($post->published_at);
        $date = date('M d Y', $date);
        $post->formattedDate = $date;
        //
        return view('blog.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags = Post::find($post->id)->tags->pluck('name')->toArray();


        $newTags = implode(', ', $tags);
        return view('blog.edit', [
            'post'=>$post,
            'tags'=>$newTags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        //
        $this->validatePost();
        $articleSlug = request('title');

        $articleSlug = explode(' ', $articleSlug);
        $articleSlug =  array_slice($articleSlug, 0,3);
        $articleSlug = implode('-', $articleSlug);
        $post->slug = $articleSlug;

        $parsedTags = [];

        if (count(explode(', ', request('tags'))) === 1) {
            if (explode(', ', request('tags'))[0] !== '') {
                $parsedTags = explode(', ', request('tags'));
            }
        } elseif (count(explode(', ', request('tags'))) > 1) {
            $parsedTags = explode(', ', request('tags'));

        }

        $newParsedTags = [];
        $tagsToRemove = [];
        $oldTags = $post->tags->pluck('name')->toArray();

        if (count($parsedTags) > 0) {
            foreach($parsedTags as $tag) {
                if ($tag !== '') {
                    if (!Tag::where('name', $tag)->exists()) {
                        $newTag = new Tag;
                        $newTag->name = $tag;
                        $newTag->save();
                        array_push($newParsedTags, $newTag->id);
                    } else {
                        if (!in_array($tag, $oldTags)) {
                            $fetchTag = Tag::where('name',$tag)->first();
                            array_push($newParsedTags,$fetchTag->id);
                        }
                    }
                }

            }
        }


        foreach($oldTags as $tag) {
            if (!in_array($tag, $parsedTags)) {
                $fetchTag = Tag::where('name',$tag)->first();
                array_push($tagsToRemove, $fetchTag->id);
            }
        }

//        dd($parsedTags, $oldTags, $tagsToRemove, $newParsedTags);

        $post->update([
            'title'=>request('title'),
            'body'=>request('body'),
            'imageLink'=>request('imageLink'),
            'imageAlt'=>request('imageAlt'),
            'slug'=>$articleSlug
        ]);

        if (count($newParsedTags) > 0) {
            $post->tags()->attach($newParsedTags);
        }
        if (count($parsedTags) === 0) {
            $post->tags()->detach();
        }elseif (count($tagsToRemove) > 0) {
            $post->tags()->detach($tagsToRemove);

        }

        return redirect($post->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route('blog.index'));

    }

    public function validatePost(): void
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
    }
}
