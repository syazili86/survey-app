<?php

$data = json_decode('[{"value": 1, "item": "Sangat Tidak Puas"},{"value": 2, "item": "Tidak Puas"},{"value": 3, "item": "Puas"},{"value": 4, "item": "Sangat Puas"}]');

print_r($data[0]->item);