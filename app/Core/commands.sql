create database grocery_store;

create table products (
	id_product varchar(4) primary key, 
	name varchar(100) not null, 
	describes longtext, 
	images longtext, 
	type_product int not null, 
	unit varchar(20) not null, 
	price int not null
);

insert into products(name, describes, images, type_product, unit, price) values('Bột thức uống lúa mạch 3in1 Milo Active Go bịch 330g', 'Thức uống cacao lúa mạch của thương hiệu ngũ cốc Milo từ mầm lúa mạch nguyên cám có tác dụng cung cấp nguồn năng lượng hoạt động lâu dài hơn cho việc học tập, chơi thể thao và các hoạt động thể chất. Bột thức uống lúa mạch 3in1 Milo Active Go bịch 330g dạng bột mịn dễ hòa tan, bịch 15 gói tiết kiệm.', '1-1.jpg;1-2.jpg;1-3.jpg', 3, 'bịch', 48000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 30 gói mì Hảo Hảo tôm chua cay 75g', 'Sợi mì Hảo Hảo vàng dai ngon hòa quyện trong nước súp tôm chua cay đậm đà từng sợi mì sóng sánh cùng hương thơm quyến rũ ngất ngây. Thùng 30 gói mì Hảo Hảo tôm chua cay 75g là lựa chọn hấp dẫn không thể bỏ qua đặc biệt là những ngày bận rộn cần bổ sung năng lượng nhanh chóng, đủ chất', '2-1.jpg;2-2.jpg;2-3.jpg', 2, 'thùng', 108000);

insert into products(name, describes, images, type_product, unit, price) values('Snack vị cua Kinh Đô gói 32g', 'Snack có hình dáng ngộ nghĩnh của những chú cua kích thích vị giác. Snack vị cua Kinh Đô gói 32g giòn ngon, hấp dẫn là món ăn yêu thích không chỉ trẻ em mà còn người lớn. Snack Kinh Đô chất lượng, tiện lợi, dễ mang theo cho các buổi đi chơi, là món ăn vặt giúp bạn thư giãn.', '3-1.jpg;3-2.jpg;3-3.jpg', 5, 'bịch', 7000);

insert into products(name, describes, images, type_product, unit, price) values('Gạo thơm đặc sản Neptune ST25 túi 5kg', 'Gạo là lương thực thực phẩm thiết yếu có trong mọi căn bếp. Gạo thơm đặc sản Neptune ST25 túi 5kg với giống gạo ST25 ngon nhất thế giới vào năm 2019, hạt cơm ngọt, dẻo nhiều và ít nở, giúp bạn ăn ngon miệng. Gạo Neptune chất lượng, thơm ngon, giúp bạn ăn được nhiều cơm.', '4-1.jpg;4-2.jpg;4-3.jpg', 1, 'bịch', 135000);

insert into products(name, describes, images, type_product, unit, price) values('Socola trứng Kinder Joy cho bé gái 20g', 'Mỗi quả trứng có ít kẹo socola và 1 món đồ chơi lắp ráp, bé có thể vừa ăn vừa chơi và vừa học nữa. Socola trứng Kinder Joy cho bé gái 20g cao cấp, thơm ngon và tiện lợi, bé mê lắm nè. Kẹo socola Kinder Joy ngộ nghĩnh, đáng yêu và dễ bỏ túi mang theo người ra ngoài chơi.', '5-1.jpg;5-2.jpg;5-3.jpg', 1, 'bịch', 28600);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 12 lon bia Bia Việt 330ml', 'Từ những nguyên liệu tự nhiên tuyển chọn. Thùng 12 lon bia Việt 330ml bia Việt 330ml chính hãng bia Bia Việt giá tốt, tiết kiệm với công nghệ lên men lạnh ở nhiệt độ 8-10 độ C giúp lưu giữ tinh túy của hoa bia và mang đến cảm giác sảng khoái bất tận khi thưởng thức', '6-1.jpg;6-2.jpg;6-3.jpg', 6, 'thùng', 127000);

insert into products(name, describes, images, type_product, unit, price) values('Nước giặt Lix Matic hương nước hoa túi 3.5kg', 'Nước giặt Lix Matic hương nước hoa túi 3.5kg hương nước hoa thơm mát, giúp quần áo trắng sạch như mới, khử mùi ẩm mốc. Nước giặt Lix matic là dòng nước giặt với công thức ít bọt, ngăn chặn tình trạng trào bọt ở máy giặt, công nghệ hạt lưu hương giúp lưu hương lâu trên quần áo sau khi giặt.', '7-1.jpg;7-2.jpg;7-3.jpg', 8, 'bịch', 28600);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 24 chai nước tinh khiết Aquafina 500ml', 'Được lấy từ nguồn nước ngầm đảm bảo  trải qua quy trình khử trùng, lọc sạch các tạp chất. Nước tinh khiết Aquafina 500ml đã đạt tới trình độ nước tinh khiết có tác dụng dịu cơn khát, khi uống sẽ có cảm giác hơi ngọt ở miệng, rất dễ uống. Nhỏ gọn tiện lợi dễ mang bên mình', '8-1.jpg;8-2.jpg;8-3.jpg', 7, 'thùng', 118000);

insert into products(name, describes, images, type_product, unit, price) values('Gạo thơm Vua Gạo ST25 túi 5kg', 'Gạo hạt dài, thơm đặc trưng và nở ít tạo giác ăn ngon miệng. Gạo thơm Vua Gạo ST25 túi 5kg vị dẻo, vị thơm đặc trưng sẽ kích thích vị giác giúp thưởng thức các món ăn khác tuyệt vời hơn. Gạo đảm bảo an toàn, không tẩy trắng, không chứa chất bảo quản. Túi 5kg phù hợp với cả gia đình.', '9-1.jpg;9-2.jpg;9-3.jpg', 1, 'bịch', 200000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 24 lon bia Heineken Sleek 330ml', 'Bia chất lượng từ thương hiệu được ưa chuộng tại hơn 192 quốc gia trên thế giới đến từ Hà Lan - Bia Heineken. 24 lon Heineken Sleek 330ml mang hương vị đặc trưng thơm ngon hương vị bia tuyệt hảo, cân bằng và êm dịu, thiết kế đẹp mắt, cho người dùng cảm giác sang trọng, nâng tầm đẳng cấp.', '10-1.jpg;10-2.jpg;10-3.jpg', 6, 'thùng', 445000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 12 chai nước uống i-on kiềm Akaline I-on Life 1.25 lít', 'Sản phẩm nước uống ion kiềm chất lượng của thương hiệu I-on Life. Nước uống i-on kiềm Akaline I-on Life 1.25 lít được sản xuất dựa trên công nghệ điện phân tiên tiến của Nhật Bản, có chứa thành phần i-on kiềm với nhiều tác dụng tốt cho sức khỏe. Cam kết chính hãng và an toàn', '11-1.jpg;11-2.jpg;11-3.jpg', 7, 'thùng', 120000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 40 bịch sữa đậu nành Fami Canxi 200ml', 'Sản phẩm được bổ sung thêm canxi, vitamin D3 và vitamin B12 giúp xương chắc khoẻ hơn mỗi ngày. Sữa đậu nành Fami thơm ngon, dễ uống, không dùng chất bảo quản. Sản phẩm thùng 40 bịch sữa Fami Canxi 200ml được đóng thùng 40 bịch tiện dùng, tiết kiệm', '12-1.jpg;12-2.jpg;12-3.jpg', 3, 'thùng', 150000);

insert into products(name, describes, images, type_product, unit, price) values('Bánh cracker hai lớp kem bơ Magic Twin hộp 300g', 'Bánh quy thơm thơm, giòn ăn kích thích vị giác. Bánh cracker hai lớp kem bơ Magic Twin hộp 300g thơm ngon, có vị kem bơ, cung cấp dinh dưỡng cho bạn, bánh quy Magic là thương hiệu đến từ Thái Lan. Bánh quy có thể ăn vào các bữa ăn phụ, vừa ngon miệng lại cung cấp năng lượng hoạt động cho bạn.', '13-1.jpg;13-2.jpg;13-3.jpg', 5, 'bịch', 2600);

insert into products(name, describes, images, type_product, unit, price) values('Nước rửa chén Sunlight Chanh 100 đánh bay dầu mỡ cứng đầu túi 3.38 lít', 'Nước rửa chén Sunlight giúp khử mùi tanh triệt để trên chén dĩa chỉ với 1 lần rửa. Nước rửa chén còn giúp diệt khuẩn hiệu quả, là thương hiệu yêu thích của hàng triệu người. Nước rửa chén Sunlight Chanh 100 chiết xuất chanh tươi túi 3.38 lít đánh bay dầu mỡ với sức mạnh 100 trái chanh.', '14-1.jpg;14-2.jpg;14-3.jpg', 8, 'bịch', 75000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 30 gói mì trộn Omachi xốt Spaghetti 90g', 'Sợi mì vàng dai ngon hòa quyện trong nước sốt mì Omachi Spaghetti đậm đà gồm bò bằm và cà chua tươi mát cùng hương thơm ngất ngây tạo ra siêu phẩm mì với sự kết hợp hương vị hài hòa, độc đáo. 30 gói mì trộn Omachi xốt Spaghetti 90g thơm ngon hấp dẫn không thể chối từ', '15-1.jpg;15-2.jpg;15-3.jpg', 2, 'thùng', 260000);

insert into products(name, describes, images, type_product, unit, price) values('Thùng 24 hộp sữa lúa mạch Milo nắp vặn 210ml', 'Sản phẩm sữa uống lúa mạch thơm ngon, giàu canxi và protein giúp cho cơ thể luôn phát triển toàn diện, sữa lúa mạch Milo được các bé cực yêu thích. Thùng 24 hộp sữa lúa mạch Milo nắp vặn 210ml đóng thùng tiết kiệm, sữa thơm ngon, bổ sung dinh dưỡng cần thiết cho bạn hoạt động cả ngày dài.', '16-1.jpg;16-2.jpg;16-3.jpg', 3, 'thùng', 242000);

rices = 1;
noodles = 2;
milks = 3
cakes = 4
snacks = 5
beers = 6
waters = 7
furnitures = 8
