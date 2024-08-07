<?php

namespace App\Http\Controllers;
use App\Models\Religion;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    //
    Public function index(): View{
        $data = Religion::all();
        //render view with posts
        return view('religion.list', compact('data'));
        // dd($religion);
    }

    public function create(): View
    {
        return view('religion.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        // $this->validate($request, [
        //     'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        //     'title'     => 'required|min:5',
        //     'content'   => 'required|min:10'
        // ]);

        // //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        Religion::create([
            'name'     => $request->name,
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now(),
        ]);

        //redirect to index
        return redirect('/religion')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get post by ID
        $religion = Religion::findOrFail($id);

        //render view with post
        return view('religion.update', compact('religion'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
    

        //get post by ID
        $religion = Religion::findOrFail($id);

            //update post with new image
            $religion->update([
                'name'     => $request->name,
                'updated_at'     =>\Carbon\Carbon::now()
            ]);

        //redirect to index
        return redirect('/religion')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $religion = Religion::findOrFail($id);

        //delete post
        $religion->delete();

        //redirect to index
        return redirect('/religion')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
