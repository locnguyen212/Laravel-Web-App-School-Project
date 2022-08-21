    SEEDER: UserSeeder
+ user: 
    - name: Super Admin
    - email: user@gmail.com
    - pass: 123123    
+ category:
    - uncategorize   


------------------------------------

    CONTROLLER
+ có thể tìm trong app => http => Controllers => admin

    VIEW
+ có thể tìm trong resourses => views => admin

    FOLDER CHỨA ẢNH
+ có thể tìm trong public -> images

    THƯ VIỆN CSS + JS CỦA TRANG ADMIN
+ có thể tìm trong public -> administrator

    FUNCTION TỰ TẠO
+ có thể tìm trong public -> userFunc

------------------------------------

    INDEX
+ danh sách function controller: IndexController
    - get trang index: index

+ danh sách middleware: SAMiddleware
    - 
    
------------------------------------

    LOGIN
+ danh sách function controller: AuthController
    - get trang login: loginPage
    - login: login
    - logout: logout

+ danh sách request:
    - AuthRequest

+ danh sách middleware:
    - AuthMiddleware    
    
------------------------------------    
    
    CATEGORY
+ danh sách function controller: CategoryController
    - get dữ liệu: index
    - form tạo dữ liệu: create
    - tạo dữ liệu: store
    - form edit dữ liệu: edit
    - edit dữ liệu: update
    - xóa dữ liệu: destroy

+ danh sách request:
    - request create: CreateRequest
    - request update: UpdateRequest

+ danh sách middleware:
    - CategoryMiddleware

------------------------------------

    USER
+ danh sách function controller: UserController
    - get dữ liệu: index
    - form tạo dữ liệu: create
    - tạo dữ liệu: store
    - form edit dữ liệu: edit
    - edit dữ liệu: update
    - xóa dữ liệu: destroy

+ danh sách request:
    - request create: CreateRequest
    - request update: UpdateRequest

+ danh sách middleware:
    - SAMiddleware

------------------------------------

    ORIGAMI
+ danh sách function controller: OrigamiController
    - get dữ liệu: index (bao gồm view index + livewire dc include)
        - livewire component: app => http => livewire => OrigamiCheckbox
        - livewire view: views => livewire => origami-checkbox
    - form tạo dữ liệu: create
    - tạo dữ liệu: store
    - form edit dữ liệu: edit
    - edit dữ liệu: update
    - xóa dữ liệu: destroy
    - form edit dữ liệu select: editSelected
    - update dữ liệu select: updateSelected

+ danh sách request:
    - request create: CreateRequest
    - request update: UpdateRequest

+ danh sách middleware:
    - OrigamiMiddleware

------------------------------------

    IMAGE
+ danh sách function controller: ContentImageController
    - get dữ liệu: index
    - form tạo dữ liệu: create
    - tạo dữ liệu: store
    - form edit dữ liệu: edit
    - edit dữ liệu: update
    - xóa dữ liệu: destroy

+ danh sách request:
    - request create: CreateRequest

+ danh sách middleware:
    - ImageMiddleware

------------------------------------

    FEEDBACK
+ danh sách function controller: FeedbackController
    - get dữ liệu: index
    - edit dữ liệu: 
        - livewire component: app => http => livewire => Approve
        - view livewire: resources => livewire => Approve
    - xóa dữ liệu: destroy

+ danh sách request:
    - request update: UpdateRequest

+ danh sách middleware:
    - FeedbackMiddleware

------------------------------------

    MAIL
+ danh sách function controller:
    - Mail Controller: app => Mail => ApproveMail
    - gửi mail Controller: app => http => livewire => Approve (Function đã đc đánh dấu)

+ view mail dùng để edit mail: resources => views => emails => ApproveMail
