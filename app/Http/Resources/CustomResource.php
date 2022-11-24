<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Convert Date to LargeDate String [ES]
     *
     * @param string $date
     * @return string
     */
    public function convertDateES($date){
        $date = [
            'd' => date('d', strtotime($date)),
            'm' => date('n', strtotime($date)),
            'y' => date('Y', strtotime($date))
        ];
        $monts = [
            'Enero', 'Febrero', 'Marzo', 'Abril',
            'Mayo', 'Junio', 'Julio', 'Agosto',
            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];

        return $date['d'] . ' de ' . $monts[$date['m'] - 1] . ' de ' . $date['y'];
    }
}
