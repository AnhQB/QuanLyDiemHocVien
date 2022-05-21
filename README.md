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
    i Xem điểm thi(học viên):
		1 Kích hoạt
		    a Học viên ấn vào "Xem điểm thi"
		2 Trình tự xử lý:
		    b chuyển sang trang xem điểm
			c in ra danh sách các kỳ, các môn học của kỳ (mặc định in ra các kỳ đang học trước)
			d học viên ấn vào từng môn để xem điểm chi tiết 
	ii Xem danh sach các môn học
		1 Kích hoạt: 
            a ấn vào "Khung chương trình"
        2 Trình tự xử lý:
		   	a chuyển trang
			b Hiển thị khung chương trình học theo mã ngành học(mã môn, tên,kỳ)
    iii Xem danh sách các môn đang học 
        1 Kích hoạt: 
            a ấn vào “các môn đang học”
        2 Trình tự xử lý:
            a Chuyển trang
            b Hiển thị các môn đang học trong kỳ này

### Giáo vụ
    i Tạo khung chương trình các ngành thuộc mỗi khóa
        1 Kích hoạt
        2 Trình tự xử lý:
            a Nhập ngành
            b Nhập môn
    ii Sắp xếp lịch sinh viên:
        1 Trình tự xử lý:
            a Nhập Khóa
            b Nhập Lớp
            c Nhập sinh viên
    iii Nhập điểm:
		1 Kích hoạt
		    a ấn vào "Nhập điểm"
		2 Trình tự xử lý:
            a chuyển sang trang nhập điểm
            b chọn khóa
            c chọn ngành
            d chọn lớp (tích chọn vào các lớp)
            e chọn môn 
            f gửi file điểm()
