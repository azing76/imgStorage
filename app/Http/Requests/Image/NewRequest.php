<?php

namespace App\Http\Requests\Image;

use App\Image;
use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
{
  public function authorize()
  {
      $user  = app( 'auth' )->user();
      $image = Image::findOrFail( $this->id );  // $id is a route parameter

      return $image->user_id === $user->id;
  }

  public function rules()
  {
      return [];
  }

  // override this to redirect back
  public function forbiddenResponse()
  {
      return redirect()->back()->withInput()->withErrors('Vous n\'avez pas les droits sur cette image.');
  }
}
