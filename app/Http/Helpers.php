<?php

use App\Models\CompanySetting;

function uploadFile($file, $folder = '/'): ?string
{
    if ($file) {
        $image_name = Rand() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $image_name, 'public');
    }
    return null;
}

function setImage($url = null, $type = null, $default_image = true): string
{
    if ($type == 'user') {
        return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_user.png') : '');
    }
    return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_image.png') : '');
}

function company(): CompanySetting
{
    return CompanySetting::first();
}
function updateFile($new_image = null, $folder = '/', $old_image = null)
{
    if ($new_image) {
        unlink(public_path() . '/storage/' . $old_image);
        $image_name = Rand() . '.' . $new_image->getClientOriginalExtension();
        return $new_image->storeAs($folder, $image_name, 'public');
    }
    return null;
}
function deleteFile($data_image = null)
{
    return unlink(public_path() . '/storage/' . $data_image);
}