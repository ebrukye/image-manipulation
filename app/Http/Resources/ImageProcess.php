<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageProcess extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $baseUrl = url('/');

        return [
            'image' => [
                'hash_name' => $this->image_hash_name,
                'original_path' => $baseUrl . $this->original_image_path,
                'modified_path' => $baseUrl . $this->modified_image_path,
                'applied' => [
                    'filter' => [
                        'name' => $this->filter_name
                    ],
                    'watermark' => [
                        'text' => $this->watermark_text,
                        'image' => [
                            'hash_name' => $this->watermark_image_hash_name,
                            'path' => $baseUrl . $this->watermark_image_path
                        ]
                    ]
                ]
            ]
        ];
    }
}
