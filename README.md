1.
1.1 
đối với windows hoặc mac có thể sử dụng herd, đối với linux có thể sử dụng composer
ngoài ra cũng có thể install manual hoặc dùng docker
1.2
/app: bao gồm controller, models và các logic sử dụng trong ứng dụng
/bootstrap: chứa file khởi chạy đầu tiên khi app chạy
/config: configure các thông số của app 
/database: chứa các factory, seeder, file migrate và file sqlite
/resources: chứa code js, vue, css và blade template
/routes: định nghĩa các route
/storage: chứa dữ liệu về log, cache và sessions
/tests: dùng trong testing
/vendor: chứa các thư viện của composer
file:
develop và maintainance: .env, artisan, .editorconfig
version control: .gitignore, .gitattributes
composer: composer.json, composer.lock
Tests: phpunit.xml
Frontend: vite.config.js, package.json, package.lock

1.3
public/index.php -> bootstrap/app.php -> HTTP kernel | console kernel 
-> service providers -> routing -> response

2.
2.1
Migration giống như một hình thức version control của database
2.2 hàm up thường dùng để tạo bảng hoặc các operation mang tính 'khởi tạo',
hàm down thường đảo nghịch các thao tác của hàm up để rollback mang tính hợp lí
2.3 php artisan migrate , php artisan migrate:rollback , php artisan make:migration

2.4 mass assignment là khi bạn muốn thêm một lượng lớn dữ liệu vào database mà không ràng buộc
trường nào được cho phép mass assign
2.5 + 2.6: sử dụng $fillable và $guarded, $fillable là mảng chứa các trường được cho phép mass assign,
$guarded chứa các trường không được phép mass assign, các trường không chứa trong $guarded 
auto được hiểu là được phép mass assign
2.7 blacklist không ngăn update dữ liệu mà chỉ ngăn update dữ liệu dạng mass assign, vì vậy có thể update như bình thường (ví dụ dùng tinker)


3. 
3.1 one - one: hasOne() >< belongsTo()
one - many: hasMany() >< belongsTo()
many -many: hasMany() >< belongsToMany()

3.2 các hàm này đều thao tác lên bảng pivot của quan hệ many - many:
attach: thêm record
detach: xóa record
sync và toggle: tham số truyền vào là 1 mảng
sync: hòa hợp bảng với mảng đó (giữ lại các ID có trong mảng, còn lại xóa)
toggle: các ID đã có trong mảng thì xóa, ID nào chưa có thì thêm

3.3 có thể sử dụng DB::table('pivot_table_name')->get()->toArray();

4.

4.1 Accessor có thể thao tác lên nhiều cột, áp dụng các phương thức linh hoạt để output ra format mong muốn
Mutator thao tác lên dữ liệu, khiến cho dữ liệu input và dữ liệu được lưu trong cơ sở dữ liệu có sự sai khác

4.2 
định nghĩa accessor: 
hàm 'get{AttributeName}Attribute($value)'
định nghĩa mutator:
hàm 'set{AttributeName}Attribute($value)'


5.
5.1
seeder: khởi tạo record dữ liệu 
factory định nghĩa cách mà một model được khởi tạo 
faker library sử dụng để fake data 


5.2
seeder được sử dụng khi cần khởi tạo data để app có cơ sở để vận hành
factory được sử dụng để tạo lượng lớn dữ liệu phục vụ mục đích testing

6. một route bao gồm:

- định nghĩa phương thức: GET hay POST hay PUT hay DELETE
- URL 
- hàm controller 
- tham số của route
- (optional) route naming
- (optional) middleware

index()
phương thức GET
công dụng: hiển thị danh sách record dữ liệu
create()
phương thức GET
công dụng: hiển thị form tạo record mới
store()
phương thức POST
công dụng: xử lý dữ liệu người dùng input 
show()
phương thức GET
công dụng: hiển thị một record cụ thể (thường) dựa vào id
edit()
phương thức GET
công dụng: hiển thị form update record dữ liệu
update()
phương thức PUT
công dụng: xử lý dữ liệu người dùng update
destroy()
phương thức: DELETE
công dụng: xóa record dữ liệu

7.
7.1 middleware được truyền vào các route nhằm thực hiện một thao tác nào đó (authentication, authorization, error handling,...)
trước khi thực hiện hàm controller đi kèm route

7.2

global middleware: middleware thao tác trên mọi request http
group middleware: middleware thao tác trên một nhóm các các tuyến khác nhau, ví dụ 'web' và 'api'
route middleware: middlware thao tác trên một route cụ thể 

8. 
8.1 breeze, jetstream, fortify, passport,sanctum
8.2 em sử dụng breeze. đối với breeze, khi cần customize logic, cần vào folder Controllers/Auth
tại đây chứa toàn bộ các thao tác chính đối với thao đăng kí đăng nhập đăng xuất

10.
10.1
bower, npm có vai trò quản lý các dependencies và các thư viện, giúp chúng ta có thể cài đặt, cập nhật, gỡ cài đặt
sao cho phù hợp với project

10.2
việc compile các file trên giúp tối ưu dung lượng mã nguồn do các khoảng trống được lược bỏ,
ngoài ra còn có lợi ích về mặt thẩm mỹ do code nhìn gọn hơn, việc gộp nhiều file làm một còn có tác dụng tăng hiệu năng 
ứng dụng, do ít request hơn 

công cụ laravel dành cho việc này có thể kể đến laravel mix

12.
12.1
eloquent orm và query builder giúp tương tác với cơ sở dữ liệu một cách mạnh mẽ mà không 
cần viết truy vấn sql 
eloquent: 
mỗi bảng trong cơ sở dữ liệu tương ứng với một lớp model trong eloquent 
query builder:
query builder giúp xây dựng các truy vấn phức tạp dựa trên việc nối chuỗi

12.2
eloquent orm:
ưu:
- dễ đọc dễ sử dụng
- hỗ trợ thiết lập các quan hệ one-one, one-many, many-many,...
- hỗ trợ eager loading
nhược: 
- chậm hơn query builder (nếu dữ liệu lớn)
query builder:
ưu:
- hiệu suất cao
- phù hợp với truy vấn đơn giản
nhược: 
- ít thân thiện hơn
12.3

EO: khi cần một giải pháp dễ sử dụng, áp dụng khi hiệu suất không phải là vấn đề quan tâm hàng đầu
QB: khi yêu cầu tối ưu hiệu suất, muốn sự linh hoạt trong truy vấn

12.4 + 12.5

Eager loading:, khi sử dụng eager loading, laravel thực hiện 
một truy vấn sql bổ sung để lấy dữ liệu liên quan cùng lúc với dữ liệu chính

eager loading sử dụng phương thức with(): được thực hiện khi đang thực hiện truy vấn,
cho phép chỉ định các quan hệ cần nạp trước trước khi trả về kết quả 

eager loading sử dụng phương thức load(): được thực hiện khi đã có kết quả truy vấn, giúp nạp thêm
các quan hệ và không phải truy vấn lại model 

Lazy loading, chỉ truy xuất dữ liệu liên quan khi ta cố gắng truy cập nó  


