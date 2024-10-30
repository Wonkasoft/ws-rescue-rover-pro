<?php

class DogModel {
    // Properties with appropriate data types as comments
    public string $id ; // int(5)
    public string $archived; // char(1)
    public string $name; // varchar(20)
    public string $other_names; // varchar(30)
    public string $profile; // varchar(30)
    public string $status; // varchar(15)
    public string $adoption_pending; // varchar(3)
    public string $sex; // varchar(1)
    public string $video; // text
    public string $video_URL; // varchar(100)
    public string $category; // varchar(10)
    public string $foster_needed; // varchar(3)
    public string $sponsored_by; // varchar(200)
    public string $short_desc; // text
    public string $long_desc; // text
    public string $date_adopted; // date
    public string $priBreed; // varchar(40)
    public string $secBreed; // varchar(40)
    public int $age; // varchar(15)
    public string $okwithdogs; // char(3)
    public string $okwithcats; // char(3)
    public string $okwithkids; // char(3)
    public string $housebroken; // char(3)
    public string $specialNeeds; // varchar(20)
    public string $size; // char(1)
    public string $shots; // varchar(50)
    public string $color; // varchar(30)
    public string $coatLength; // varchar(20)
    public string $incoming_info; // date
    public string $incoming_date; // date
    public string $location_type; // varchar(10)
    public string $location; // varchar(20)
    public string $rabies; // char(1)
    public string $rabies_time; // date
    public string $DHLPP; // char(1)
    public string $DHLPP_time; // date
    public string $bord; // varchar(1)
    public string $bord_time; // date
    public string $flea_tick; // date
    public string $worm; // date
    public string $flu; // varchar(10)
    public string $flu_type; // varchar(20)
    public string $microchip; // varchar(15)
    public string $impound_num; // char(3)
    public string $fixed; // text
    public string $notes; // varchar(4)
    public string $litter; // text
    public string $litter_notes; // varchar(30)
    public string $vol_contact; // varchar(30)

    // Constructor to initialize the model with optional data
    public function __construct(array $data = []) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // Generate form fields dynamically from the model properties
    public function generateFormFields($readonly = false) {
        $output = '';
        foreach ($this->toArray() as $key => $value) {
            $readonlyAttr = $readonly ? 'readonly' : '';
            $output .= "
                <div class='mb-3'>
                    <label for='{$key}' class='form-label'>" . ucfirst($key) . "</label>
                    <input type='text' class='form-control' id='{$key}' name='{$key}' value='{$value}' {$readonlyAttr}>
                </div>
            ";
        }
        return $output;
    }

    // Convert the model to an associative array
    public function toArray(): array {
        return get_object_vars($this);
    }
}