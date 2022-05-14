# QuanLyDiemHocVien

[File Word](https://docs.google.com/document/d/1FWBwxTRQcKIhyut788_8H98YSkzhseFZWgXEImOc9ag/edit?usp=sharing)
<br />
[ERD](https://drive.google.com/file/d/188AwsRL-o4Ny8g720pagM5M7IZxW-cQs/view?usp=sharing)
<br />
[DB excel](https://docs.google.com/spreadsheets/d/1kTHIvvO7qAOM1ewBwm4xIt-Lw5qrV4MLJZrOLwpO1zs/edit?usp=sharing)



## Đối tượng sử dụng 
- Quản trị viên
- Người dùng(học viên, giáo viên, giáo vụ)
## Chức năng từng đối tượng:
- Quản trị viên:
	+ Quản lý trang thông tin: banner,..
	+ Quản lý người dùng
- Quản lý người dùng:
	+ Người dùng
		- Học viên
			+ xem điểm thi: các kỳ đã/ đang học
			+ xem danh sách các môn học: tất cả các môn của ngành học
			+ (xem danh sách các lớp, sinh viên trong lớp đó)
		- Giáo viên
			+ Xem thông tin tất cả các sinh viên (thông qua maSV): tên,địa chỉ, điểm...
			+ xem danh sách các lớp, sinh viên trong lớp đó, điểm thi
		- Giáo vụ
		    + Quản lý khóa
		    + Quản lý ngành
		    + Quản lý lớp
		    + Quản lý môn học
		    + Quản lý giáo viên
		    + Quản lý học viên
		    + Quản lý điểm
## Phân tích chức năng
### Học viên
	+ Xem điểm thi(học viên):
		- Kích hoạt
		   : Học viên ấn vào "Xem điểm thi"
		- Trình tự xử lý:
			: chuyển sang trang xem điểm
			: in ra danh sách các kỳ, các môn học của kỳ (mặc định in ra các kỳ đang học trước)
			: học viên ấn vào từng môn để xem điểm chi tiết 
	+ Xem danh sach các môn học
		- Kích hoạt: 
		    : ấn vào "Khung chương trình"
		- Trình tự xử lý:
		   	: chuyển trang
			: Hiển thị khung chương trình học theo mã ngành học(mã môn, tên,kỳ)
	
### Giáo viên
	- Xem thông tin tất cả các sinh viên:
		+ Kích hoạt
		    : nhập "Mã SV vào ô tìm kiếm"
		+ Trình tự xử lý:
			:	.....
	- Xem danh sách các lớp:
		+ Kích hoạt
		    : ấn vào "Danh sách các lớp"
		+ Trình tự xử lý:
			: Chuyển trang
			: Hiển thị các khóa học viên(đang học), các ngành(2 ngành trong để tài)
			: Chọn ngành để hiện thị các lớp của ngành đó
			: Chọn lớp để hiện thị danh sách các sinh viên lớp đó
	- Thống kê bảng điểm theo lớp của từng môn:
		+ Kích hoạt
			: ấn vào ""
		+ Trình tự xử lý
			: Chuyển trang
			: Lọc theo môn -> hiển thị ra đồ thị điểm của từng lớp (x: điểm , y: lớp)
			: ...
### Giáo vụ
    - Nhập điểm:
		+ Kích hoạt
		    : ấn vào "Nhập điểm"
		+ Trình tự xử lý:
			: chuyển sang trang nhập điểm
			: ấn vào từng lớp để nhập điểm
			: không biết đọc điểm từ file được không
