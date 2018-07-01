<?php
class upload{
	public $file ;  
	public $error ;
	public $messge_error ;
	public $extension ;
	protected $dirold ; 
	private $new_dir ; 
	const welecome = 'welecome here in any time >>>>' ;
	public function __call ($method_name,$arrray_parmeter){
		echo 'THE '.$method_name.' YOUR TRY CALL NOT FOUND OR ACCESSIBLE';
	}
	public function upload_file ($support,$error){ // two agrment support is array types support and error array errors $_files 
		if (isset($_FILES['upload_file'])){
		if (in_array($this->extension,$support) === true ){ // is condition for search in array and return to ture if extension is support
			if (is_dir(__dir__ .'upload') == null ){ // if not exists dir make a new dir 
			 echo @mkdir('upload') ;
			}
			$this->dirold = $_FILES['upload_file']['tmp_name']  ;
             $this->new_dir = __dir__.'/upload/'. rand(1000,60000) . $_FILES['upload_file']['name'] ; // new dir and rename
            // rename($this->dirold, upload::$file_name . $this->extension);
             move_uploaded_file($this->dirold , $this->new_dir);
              return $this->messge_error[$this->error] = $this->messge_error [$error] . '<br / >' . $this->new_dir ; 
return  $this->messge_error[$this->error] = $this->messge_error[$error] . '<br />' . self::welecome  ;
		}elseif(in_array($this->extension,$support) === false ){ // but this condition for not support iam search in array extension 
			if ($this->error == 0){
			if (unlink($_FILES['upload_file']['tmp_name']) === true ){
				return die('the file upload and remove because not support ' . $this->extension) ;
			}
			}
return $this->messge_error[$this->error] = $this->messge_error [$error] . 'the not' . '<br />' . self::welecome; // return messge error 
}
	} else {
	echo	'SET YOUR FILE TO UPLOAD NOW TIME IS ' . date('h:i:s') ;
	}
}
}
error_reporting(0);
$file = new upload;
$error = $file->error = $_FILES['upload_file'] ['error'];
$file->extension = strstr($_FILES['upload_file'] ['name'], '.') ;
$support =array('.png' ,'.jpg','.jpeg','.PNG','.JPG','.JPEG' );
$file->messge_error = array(
 'تم تحميل الملف بنجاح' ,
   'الملف اكبر من الحجم المتاح للرفع',
  'الملف اكبر من الحجم المتاح للرفع',
  'UPLOAD_ERR_PARTIAL',
   'الملف لم يتم رفعه',
  'UPLOAD_ERR_NO_TMP_DIR',
   'UPLOAD_ERR_CANT_WRITE',
  'UPLOAD_ERR_EXTENSION'
) ;
$pagename = 'مركز رفع الصور' ;
include 'include/nav.html' ;
echo $file->upload_file($support,$error)  ;
// if not subport extention the site note motion
 ?>
<form action="up.php" method="POST" enctype="multipart/form-data" dir="rtl">
	<input type="file" name="upload_file">
	<input type="submit" name="OK">
</form>
<?php require 'include/motion.html' ; ?>