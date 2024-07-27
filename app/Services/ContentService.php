<?php

namespace App\Services;

use App\Models\Content;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ContentService
{
    public function getAllContents()
    {
        return Content::all();
    }

    public function findContentById($id)
    {
        return Content::find($id);
    }

    public function createContent(array $data)
    {
        $validator = Validator::make($data, Content::rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Content::create($data);
    }

    public function updateContent($id, array $data)
    {
        $validator = Validator::make($data, Content::rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $content = Content::find($id);
        if ($content) {
            $content->update($data);
            return $content;
        }
        return null;
    }

    public function deleteContent($id)
    {
        $content = Content::find($id);
        if ($content) {
            return $content->delete();
        }
        return null;
    }
}