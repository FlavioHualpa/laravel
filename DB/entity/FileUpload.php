<?php

class FileUpload
{
   private function __construct()
   {
      //
   }

   public static function getFile(string $file) : array
   {
      if (isset($_FILES[$file])) {
         return $_FILES[$file];
      }
      return [ 'name' => '' ];
   }

   public static function getUploadedName(string $file) : ?string
   {
      if (isset($_FILES[$file])) {
         $upload = $_FILES[$file];
         if ($upload['error'] === UPLOAD_ERR_OK) {
            $tempName = $upload['tmp_name'];
            $ext = pathinfo($upload['name'], PATHINFO_EXTENSION);
            $uploadedName = md5($tempName) . '.' . $ext;
            move_uploaded_file($tempName, '../img/avatars/' . $uploadedName);
            return $uploadedName;
         }
      }
      return null;
   }
}