<?php require_once "dbCon.php";

	class data extends dbCon{
		
		public function TruyenMoiUpdate(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` ORDER BY ngay_update DESC LIMIT 0, 6";
			return $this->con->query($qr);
		}

		public function TruyenMoiUpdate_XemThem(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` ORDER BY ngay_update DESC LIMIT 0, 24";
			return $this->con->query($qr);
		}

		public function TruyenHOT(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` ORDER BY luot_xem DESC LIMIT 0, 9";
			return $this->con->query($qr);
		}

		public function TruyenHOT2(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` ORDER BY luot_xem DESC LIMIT 0, 24";
			return $this->con->query($qr);
		}

		public function TruyenDich(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` WHERE loai_truyen = 'Truyện dịch' ORDER BY ngay_update DESC LIMIT 0, 24";
			return $this->con->query($qr);
		}

		public function TruyenConvert(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` WHERE loai_truyen = 'Truyện convert' ORDER BY ngay_update DESC LIMIT 0, 24";
			return $this->con->query($qr);
		}

		public function TruyenHoanThanh(){
			$qr = "SELECT id_truyen, tac_gia, tua_truyen, tua_khong_dau FROM `truyen` WHERE trang_thai = 'Hoàn thành' LIMIT 0, 12";
			return $this->con->query($qr);
		}

		public function TruyenHoanThanh_XemThem(){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` WHERE trang_thai = 'Hoàn thành' LIMIT 0, 24";
			return $this->con->query($qr);
		}

		public function ChiTietTruyen($idTruyen){
			$qr = "SELECT * FROM `truyen` WHERE id_truyen = $idTruyen";
			return $this->con->query($qr);
		}

		public function Get5ChuongMoi($idTruyen){
			$qr = "SELECT id_chuong, ngay_dang, so_chuong, tua_chuong FROM `chuong` WHERE id_truyen = $idTruyen ORDER BY ngay_dang DESC LIMIT 0, 5";
			return $this->con->query($qr);
		}

		public function GetListChuong($idTruyen){
			$qr = "SELECT id_chuong, ngay_dang, so_chuong, tua_chuong FROM `chuong` WHERE id_truyen = $idTruyen LIMIT 0, 25";
			return $this->con->query($qr);
		}

		public function GetChuong($idChuong){
			$qr = "SELECT * FROM `chuong` WHERE id_chuong = $idChuong";
			return $this->con->query($qr);
		}

		public function GetTheLoai($idTruyen){
			$qr = "SELECT ten_tl FROM `the_loai` WHERE id_truyen = $idTruyen";
			return $this->con->query($qr);
		}

		public function GetTruyenCuaTacGia($author){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` WHERE tac_gia = '$author'";
			return $this->con->query($qr);
		}

		public function GetTruyenCungTL($type){
			$qr = "SELECT truyen.id_truyen, truyen.thumbnail, truyen.tua_truyen, truyen.tua_khong_dau, truyen.so_chuong FROM `truyen`, `the_loai` WHERE (truyen.id_truyen = the_loai.id_truyen) AND (the_loai.ten_tl = '$type')";
			return $this->con->query($qr);
		}

		public function SearchTruyen($key){
			$qr = "SELECT id_truyen, thumbnail, tua_truyen, tua_khong_dau, so_chuong FROM `truyen` WHERE tua_truyen REGEXP '$key' OR tac_gia REGEXP '$key' ORDER BY ngay_update DESC";
			return $this->con->query($qr);
		}

		public function GetTenTruyen($idTruyen){
			$qr = "SELECT tua_truyen FROM `truyen` WHERE id_truyen = $idTruyen";
			return $this->con->query($qr)->fetch_array(MYSQLI_ASSOC)['tua_truyen'];
		}

		public function GetTuaKhongDau($idTruyen){
			$qr = "SELECT tua_khong_dau FROM `truyen` WHERE id_truyen = $idTruyen";
			return $this->con->query($qr)->fetch_array(MYSQLI_ASSOC)['tua_khong_dau'];
		}

		public function TangLuotXem($idTruyen){
			$qr = "UPDATE `truyen` SET luot_xem = luot_xem + 1 WHERE id_truyen = $idTruyen";
			$this->con->query($qr);
		}

		public function BatDauDocTruyen($idTruyen, $chuong){
			if($chuong >= 1){
				$qr = "SELECT id_chuong FROM `chuong` WHERE id_truyen = $idTruyen ORDER BY so_chuong ASC LIMIT 0, 1";
				$res_cc = $this->con->query($qr);
				$post_cc = $res_cc->fetch_array(MYSQLI_ASSOC);
				return $post_cc['id_chuong'];
			}	
			else
				return "disabled";
		}

		public function CheckChuongTruoc($chuong, $idTruyen){
			$chuong--;

			if($chuong <= 0)
				return "disabled";
			else{
				$qr = "SELECT id_chuong FROM `chuong` WHERE id_truyen = $idTruyen AND so_chuong = $chuong";
				$res_c = $this->con->query($qr);
				$post_c = $res_c->fetch_array(MYSQLI_ASSOC);
				return $post_c['id_chuong'];
			}
		}

		public function CheckChuongSau($idTruyen, $chuong){
			$chuong++;
			$qr = "SELECT id_chuong FROM `chuong` WHERE id_truyen = $idTruyen AND so_chuong = $chuong";
			$res_chuong_sau = $this->con->query($qr);
			$kq_chuong = mysqli_num_rows($res_chuong_sau); 

			if($kq_chuong <= 0)
				return "disabled";
			else{
				$post_cs = $res_chuong_sau->fetch_array(MYSQLI_ASSOC);
				return $post_cs['id_chuong'];
			}
		}

		public function SoTrang($tongChuong){
			$chuong1trang = 25;
			echo $sotrang = ceil($tongChuong/$chuong1trang);
		}

		public function AjaxChuong($id, $tongChuong, $page){
			$chuong1trang = 25;
			$sotrang = ceil($tongChuong/$chuong1trang);
			$form = (($page-1) * $chuong1trang);

			$qr = "SELECT id_chuong, so_chuong, tua_chuong FROM `chuong` WHERE id_truyen = $id LIMIT $form, $chuong1trang";
			return $this->con->query($qr);
		}

		public function UserLogin($user, $pass){
			$pass = md5(addslashes($pass));
			$user = addslashes($user);
			$qr = "SELECT loai_tai_khoan FROM `tai_khoan` WHERE ten_dang_nhap = '$user' AND mat_khau = '$pass'";
			return $this->con->query($qr);
		}

		public function utf8convert($str) {

            if(!$str) return false;
            $utf8 = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'd'=>'đ|Đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',);

            foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i", $ascii, $str);
            $str = str_replace(" ", "-", $str);
            $str = str_replace("/", "", $str);
            $str = str_replace("'", "", $str);
            $str = strtolower($str);
			return $str;
		}

		// Nguoi Dung Binh Thuong

		public function UserGetTruyen($user){
			$qr = "SELECT * FROM `truyen` WHERE nguoi_dang = '$user'  ORDER BY ngay_update DESC";
			return $this->con->query($qr);
		}

		public function AdminGetTruyen(){
			$qr = "SELECT * FROM `truyen` ORDER BY ngay_update DESC";
			return $this->con->query($qr);
		}

		public function AddChap($idStory, $numChap, $titleChap, $contentChap){
			$titleChap = addslashes($titleChap);
			$contentChap = addslashes($contentChap);
			$contentChap = str_replace("\n", "<br/>", $contentChap);
			
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date_update = date("Y-m-d H:i:s");

			$qr = "INSERT INTO `chuong` VALUES (null, $numChap, '$titleChap', '$contentChap', '$date_update', $idStory)";
			$res_addChap = $this->con->query($qr);
			
			if($res_addChap){
				$qr1 = "UPDATE `truyen` SET ngay_update = '$date_update', so_chuong = $numChap WHERE id_truyen = $idStory";
				$this->con->query($qr1);
			}
		}

		public function EditStory($idTruyen, $title, $title_k, $image, $author, $loai_truyen, $trang_thai, $review, $nguon){
			$title = addslashes($title);
			$author = addslashes($author);
			$review = str_replace("\n", "<br/>", $review);
			$review = addslashes($review);
			$qr = "UPDATE `truyen` SET tua_truyen = '$title', tua_khong_dau = '$title_k', thumbnail = '$image', tac_gia = '$author', trang_thai = '$trang_thai', loai_truyen = '$loai_truyen', review = '$review', nguon = '$nguon' WHERE id_truyen = $idTruyen";
			$this->con->query($qr);
		}

		public function GetListChuong_Admin($idTruyen){
			$qr = "SELECT tua_chuong, so_chuong, id_chuong FROM `chuong` WHERE id_truyen = $idTruyen ORDER BY so_chuong DESC";
			return $this->con->query($qr);
		}

		public function Save_Chuong($idChap, $numChap, $title, $content){
			$title = addslashes($title);
			$content = addslashes($content);
			$content = str_replace("\n", "<br/>", $content);
			$qr = "UPDATE `chuong` SET  so_chuong = $numChap, tua_chuong = '$title', noi_dung = '$content' WHERE id_chuong = $idChap";
			$this->con->query($qr);
		}

		public function UserCreateStory($titleTruyen, $titleKhongDau, $urlImage, $review, $nguon, $author, $loaiTruyen, $trangThai, $user){
			$titleTruyen = addslashes($titleTruyen);
			$review = addslashes($review);
			$review = str_replace("\n", "<br/>", $review);
			$author = addslashes($author);

			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date_post = date("Y-m-d H:i:s");
			
			$qr = "INSERT INTO `truyen` VALUES (null, '$titleTruyen', '$titleKhongDau', '$urlImage', '$author', 0, '$trangThai', '$loaiTruyen', 0, '$date_post', '$date_post', '$review', '$nguon', '$user')";
			$this->con->query($qr);
		}

		public function DeleteTruyen($idTruyen){
			$qr = "DELETE FROM `chuong` WHERE id_truyen = $idTruyen";
			$qr1 = "DELETE FROM `the_loai` WHERE id_truyen = $idTruyen";
			$qr2 = "DELETE FROM `truyen` WHERE id_truyen = $idTruyen";
			$this->con->query($qr);
			$this->con->query($qr1);
			$this->con->query($qr2);
		}

		public function DeleteChapter($idChuong){
			$qr = "DELETE FROM `chuong` WHERE id_chuong = $idChuong";
			$this->con->query($qr);
		}

		public function UpdateChaperKhiXoa($idTruyen){
			$truyvan = "UPDATE `truyen` SET so_chuong = so_chuong - 1 WHERE id_truyen = $idTruyen";
			$this->con->query($truyvan);
		}

		public function GetTheLoaiTruyen_Admin(){
			$truyvan = "SELECT * FROM the_loai_admin";
			return $this->con->query($truyvan);
		}

		public function SoLuongTheLoaiTruyen_Admin(){
			$truyvan = "SELECT * FROM the_loai_admin";
			$res = $this->con->query($truyvan);
			return mysqli_num_rows($res); 
		}

		public function GetID_TRUYEN($tua_truyen, $ten_k_dau, $author){
			$truyvan = "SELECT id_truyen FROM `truyen` WHERE tua_truyen = '$tua_truyen' AND tua_khong_dau = '$ten_k_dau' AND tac_gia = '$author'";
			return $this->con->query($truyvan)->fetch_array(MYSQLI_ASSOC)['id_truyen'];
		}

		public function InsertTheLoaiChoTruyen($theLoai, $idTruyen){
			$truyvan = "INSERT INTO `the_loai` VALUES (null, '$theLoai', $idTruyen)";
			$this->con->query($truyvan);
		}

		public function DeleteTheLoai_Truyen($idTruyen){
			$truyvan = "DELETE FROM `the_loai` WHERE id_truyen = $idTruyen";
			$this->con->query($truyvan);
		}

		public function CheckLogin(){
			if(!isset($_SESSION['t_user']))
				echo 'Đăng Nhập';
			else
				echo 'Trang Quảng Trị';
		}

		public function GetNameUser(){
			if(isset($_SESSION['t_user']))
				return $_SESSION['t_user'];
		}

		public function GetBooks($user){
			$qr = "SELECT truyen.id_truyen, truyen.thumbnail, truyen.tua_truyen, truyen.tua_khong_dau, truyen.so_chuong FROM `books`, `truyen` WHERE books.id_truyen = truyen.id_truyen AND books.nguoi_dung = '$user'";
			return $this->con->query($qr);
		}

		public function ConvertDate($date){
			$myDate = date_create($date);
			echo date_format($myDate,"d/m/Y H:i:s");
		}

		public function GetAllTheLoaiTruyen(){
			$qr = "SELECT * FROM the_loai_admin";
			return $this->con->query($qr);
		}

		public function GetTenTheLoaiTruyen($id){
			$qr = "SELECT * FROM the_loai_admin where idTL = $id";
			return $this->con->query($qr);
		}

		function UpdateTheLoaiTruyen($id, $ten, $tenCu){
			$qr = "UPDATE the_loai_admin SET ten = '$ten' WHERE idTL = $id";
			$qr1 = "UPDATE the_loai SET ten_tl = '$ten' WHERE ten_tl = '$tenCu'";
			$this->con->query($qr);
			$this->con->query($qr1);
		}

		function DeleteTheLoaiTruyen($id, $ten){
			$qr = "DELETE FROM the_loai_admin WHERE idTL = $id";
			$qr1 = "DELETE FROM the_loai WHERE ten_tl = '$ten'";
			$this->con->query($qr);
			$this->con->query($qr1);
		}

		function ThemTheLoaiTruyen($ten){
			$qr = "INSERT INTO the_loai_admin VALUES (null, '$ten')";
			$this->con->query($qr);
		}

		function Get9TruyenTienHiepHOT(){
			$qr = "SELECT truyen.id_truyen, truyen.tua_truyen, truyen.tua_khong_dau FROM `truyen`, `the_loai` WHERE (truyen.id_truyen = the_loai.id_truyen) AND (the_loai.ten_tl = 'Tiên Hiệp') ORDER BY truyen.luot_xem ASC LIMIT 0, 9";
			return $this->con->query($qr);
		}

		function Get9TruyenHuyenHuyenHOT(){
			$qr = "SELECT truyen.id_truyen, truyen.tua_truyen, truyen.tua_khong_dau FROM `truyen`, `the_loai` WHERE (truyen.id_truyen = the_loai.id_truyen) AND (the_loai.ten_tl = 'Huyền Huyễn') ORDER BY truyen.luot_xem ASC LIMIT 0, 9";
			return $this->con->query($qr);
		}

		function Get9TruyenDoThiHOT(){
			$qr = "SELECT truyen.id_truyen, truyen.tua_truyen, truyen.tua_khong_dau FROM `truyen`, `the_loai` WHERE (truyen.id_truyen = the_loai.id_truyen) AND (the_loai.ten_tl = 'Đô Thị') ORDER BY truyen.luot_xem ASC LIMIT 0, 9";
			return $this->con->query($qr);
		}

		function Get9TruyenNgonTinhHOT(){
			$qr = "SELECT truyen.id_truyen, truyen.tua_truyen, truyen.tua_khong_dau FROM `truyen`, `the_loai` WHERE (truyen.id_truyen = the_loai.id_truyen) AND (the_loai.ten_tl = 'Ngôn Tình') ORDER BY truyen.luot_xem ASC LIMIT 0, 9";
			return $this->con->query($qr);
		}
	}
	
?>