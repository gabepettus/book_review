<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:100',
            'rating' => 'required',
            'review' => 'required',
            'reviewer' => 'required'
        ];
    }

    protected function prepareForValidation()
    {

        // checking to see if title is empty and if so pulling c=and capping from review
        $title = "";
        if (preg_match("/^\s*$/",$this->title) || empty($this->title)) {
            // strip leading spaces and .'s
            $this->review = preg_replace('/^[\.\s]+/', '', $this->review);

            // looks like split is adding on leading and trailing space
            $titleArray = preg_split("//", $this->review);
            
            // 102 since extra values are added in from the split - should strip them
            // ensure title will be less than 100
            $newTitleLength = count($titleArray) < 102 ? count($titleArray) : 100;
            
            for ($i=0; $i < $newTitleLength ; $i=$i+1) {
                if ( preg_match("/[\.\?!]/", $titleArray[$i]) ) {
                    // find end of sentance add  ellipses force exit of loop
                    $title = $title . " ...";
                    $i = count($titleArray);
                } elseif ( $i === 1 ) {
                    $title = $title . strtoupper($titleArray[$i]);
                } elseif ( ($i != count($titleArray)-1 ) && ( preg_match("/\s/",$titleArray[$i])) ) {
                    // add space and cap value to title
                    $title = $title . $titleArray[$i] . strtoupper($titleArray[$i+1]);
                    $i = $i+1;
                } else {
                    $title = $title . $titleArray[$i];
                }
            }
        } else {
            $title = $this->title;
        }
        $this->title = $title;

        $this->merge([
            'title' => $title,
            'reviewer' => "Mr Hooper",
        ]);
    }
}
