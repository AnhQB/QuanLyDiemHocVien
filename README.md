# QuanLyDiemHocVien

[File Word](https://docs.google.com/document/d/1FWBwxTRQcKIhyut788_8H98YSkzhseFZWgXEImOc9ag/edit?usp=sharing)
<br />
[ERD](https://drive.google.com/file/d/188AwsRL-o4Ny8g720pagM5M7IZxW-cQs/view?usp=sharing)
<br />
[DB excel](https://docs.google.com/spreadsheets/d/1kTHIvvO7qAOM1ewBwm4xIt-Lw5qrV4MLJZrOLwpO1zs/edit?usp=sharing)



## Đối tượng sử dụng 
- Quản trị viên
- Người dùng(học viên, giáo vụ)
## Chức năng từng đối tượng:
- Quản trị viên:
	+ Quản lý trang thông tin: banner,..
	+ Quản lý người dùng
- Quản lý người dùng:
	+ Người dùng
		- Học viên
			+ Xem điểm thi: hiển thị các kỳ đã/ đang học, mỗi kỳ hiển thị danh sách các môn của kỳ đó
			+ Xem khung chương trình các môn học: tất cả các môn của ngành học
			+ Xem danh sách các lớp, thông tin sinh viên trong lớp đó (mã sinh viên, ảnh, họ tên)
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
    + Xem danh sách các môn đang học 
        - Kích hoạt: 
            : ấn vào “các môn đang học”
        - Trình tự xử lý:
            : Chuyển trang
            : Hiển thị các môn đang học trong kỳ này

### Giáo vụ
    - Tạo khung chương trình các ngành thuộc mỗi khóa
        + Kích hoạt
        + Trình tự xử lý:
            : Nhập ngành
            : Nhập môn
    - Sắp xếp lịch sinh viên:
        + Trình tự xử lý:
            : Nhập Khóa
            : Nhập Lớp
            : Nhập sinh viên
    - Nhập điểm:
		+ Kích hoạt
		    : ấn vào "Nhập điểm"
		+ Trình tự xử lý:
            : chuyển sang trang nhập điểm
            : chọn khóa
            : chọn ngành
            : chọn lớp (tích chọn vào các lớp)
            : chọn môn 
            : gửi file điểm()
