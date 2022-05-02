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
		
	






Dillinger is a cloud-enabled, mobile-ready, offline-storage compatible,
AngularJS-powered HTML5 Markdown editor.

- Type some Markdown on the left
- See HTML in the right
- ✨Magic ✨

## Features

- Import a HTML file and watch it magically convert to Markdown
- Drag and drop images (requires your Dropbox account be linked)
- Import and save files from GitHub, Dropbox, Google Drive and One Drive
- Drag and drop markdown and HTML files into Dillinger
- Export documents as Markdown, HTML and PDF

Markdown is a lightweight markup language based on the formatting conventions
that people naturally use in email.
As [John Gruber] writes on the [Markdown site][df1]

> The overriding design goal for Markdown's
> formatting syntax is to make it as readable
> as possible. The idea is that a
> Markdown-formatted document should be
> publishable as-is, as plain text, without
> looking like it's been marked up with tags
> or formatting instructions.

This text you see here is *actually- written in Markdown! To get a feel
for Markdown's syntax, type some text into the left window and
watch the results in the right.

## Tech

Dillinger uses a number of open source projects to work properly:

- [AngularJS] - HTML enhanced for web apps!
- [Ace Editor] - awesome web-based text editor
- [markdown-it] - Markdown parser done right. Fast and easy to extend.
- [Twitter Bootstrap] - great UI boilerplate for modern web apps
- [node.js] - evented I/O for the backend
- [Express] - fast node.js network app framework [@tjholowaychuk]
- [Gulp] - the streaming build system
- [Breakdance](https://breakdance.github.io/breakdance/) - HTML
to Markdown converter
- [jQuery] - duh

And of course Dillinger itself is open source with a [public repository][dill]
 on GitHub.

## Installation

Dillinger requires [Node.js](https://nodejs.org/) v10+ to run.

Install the dependencies and devDependencies and start the server.

```sh
cd dillinger
npm i
node app
```

For production environments...

```sh
npm install --production
NODE_ENV=production node app
```

## Plugins

Dillinger is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Dropbox | [plugins/dropbox/README.md][PlDb] |
| GitHub | [plugins/github/README.md][PlGh] |
| Google Drive | [plugins/googledrive/README.md][PlGd] |
| OneDrive | [plugins/onedrive/README.md][PlOd] |
| Medium | [plugins/medium/README.md][PlMe] |
| Google Analytics | [plugins/googleanalytics/README.md][PlGa] |

## Development

Want to contribute? Great!

Dillinger uses Gulp + Webpack for fast developing.
Make a change in your file and instantaneously see your updates!

Open your favorite Terminal and run these commands.

First Tab:

```sh
node app
```

Second Tab:

```sh
gulp watch
```

(optional) Third:

```sh
karma test
```

#### Building for source

For production release:

```sh
gulp build --prod
```

Generating pre-built zip archives for distribution:

```sh
gulp build dist --prod
```

## Docker

Dillinger is very easy to install and deploy in a Docker container.

By default, the Docker will expose port 8080, so change this within the
Dockerfile if necessary. When ready, simply use the Dockerfile to
build the image.

```sh
cd dillinger
docker build -t <youruser>/dillinger:${package.json.version} .
```

This will create the dillinger image and pull in the necessary dependencies.
Be sure to swap out `${package.json.version}` with the actual
version of Dillinger.

Once done, run the Docker image and map the port to whatever you wish on
your host. In this example, we simply map port 8000 of the host to
port 8080 of the Docker (or whatever port was exposed in the Dockerfile):

```sh
docker run -d -p 8000:8080 --restart=always --cap-add=SYS_ADMIN --name=dillinger <youruser>/dillinger:${package.json.version}
```

> Note: `--capt-add=SYS-ADMIN` is required for PDF rendering.

Verify the deployment by navigating to your server address in
your preferred browser.

```sh
127.0.0.1:8000
```

## License

MIT

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
