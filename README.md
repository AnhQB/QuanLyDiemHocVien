# QuanLyDiemHocVien

[File Word](https://docs.google.com/document/d/1FWBwxTRQcKIhyut788_8H98YSkzhseFZWgXEImOc9ag/edit?usp=sharing)

## Đối tượng sử dụng 
- Quản trị viên
- Người dùng(học viên, giáo viên, nhân viên(trợ giảng,...))
## Chức năng từng đối tượng:
- Quản trị viên	
	+ Quản lý trang thông tin: banner,..
- Quản lý người dùng:
	+ Người dùng
		- Học viên:
		    : xem điểm thi: các kỳ đã/ đang học
			: xem danh sách các môn học: tất cả các môn của ngành học
			: (xem danh sách các lớp, sinh viên trong lớp đó)
		- Giáo viên
			: Nhập điểm: lớp đang phụ trách giảng dạy
			: Xem thông tin tất cả các sinh viên (thông qua maSV): tên,địa chỉ, điểm...
			: xem danh sách các lớp, sinh viên trong lớp đó, điểm thi
		 - Nhân viên:
			: Quản lý diểm thi
			: Đăng bài thông báo: (news) thông báo đã có điểm thi....
			: Quản lý danh sách các môn học: từng ngành, kỳ
			: 
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
	- Nhập điểm:
		+ Kích hoạt
		    : ấn vào "Nhập điểm"
		+ Trình tự xử lý:
			: chuyển sang trang nhập điểm
			: hiển thị danh sách các lớp đang phụ trách dạy
			: ấn vào từng lớp để nhập điểm
			: không biết đọc điểm từ file được không
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
### Nhân viên:
