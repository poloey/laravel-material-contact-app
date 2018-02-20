<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Storage;
use Image;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(15);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'mobile' => 'required'
        ]);
        Contact::insert([
          'name' => $request->input('name'),
          'mobile' => $request->input('mobile'),
          'email' => $request->input('email'),
          'city' => $request->input('city'),
          'address' => $request->input('address'),
          'facebook' => $request->input('facebook'),
          'twitter' => $request->input('twitter'),
          'linkedin' => $request->input('linkedin'),
          'user_id' => auth()->id(),
        ]);

        Session::flash('message', 'Contact added successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $contact = Contact::find($id);
      $this->validate($request, [
        'name' => 'required',
        'mobile' => 'required'
      ]);
      $contact->name = $request->input('name');
      $contact->mobile = $request->input('mobile');
      $contact->email = $request->input('email');
      $contact->city = $request->input('city');
      $contact->address = $request->input('address');
      $contact->facebook = $request->input('facebook');
      $contact->twitter = $request->input('twitter');
      $contact->linkedin = $request->input('linkedin');
      $contact->save();
      Session::flash('message', 'status updated successfully');
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect( route('contacts.index'));
    }
    public function upload_image(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required',
            'contact_id' => 'required'
        ]);
        // if ($request->has('avatar')) {
        //     $extension = $request->avatar->extension();
        //     $request->avatar->storeAs('public/images', time().'.'.$extension);
        //     return redirect()->back();
        // } else {
        //     echo 'has no file';
        // }
        if ($request->has('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension() ;
            $relative_file_path = '/images/uploads/' . $filename;
            $absolute_file_path = public_path($relative_file_path);
            Image::make($avatar)->resize(350, 350)->save($absolute_file_path);
            $contact = Contact::find($request->input('contact_id'));
            $old_image_abs_path = public_path($contact->image);
            if (file_exists($old_image_abs_path) ) {
                unlink($old_image_abs_path);
            }
            $contact->image = $relative_file_path;
            $contact->save();
            return redirect()->back();
        }
    }
}
