-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2023 lúc 05:53 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `green`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_brand` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `administrator`
--

INSERT INTO `administrator` (`id_admin`, `id_role`, `username`, `name_brand`, `fullname`, `phone`, `email`, `avatar`, `mk`) VALUES
(1, 1, 'admin', '', 'Ngô Quang Huy', '0378396888', 'huy123@gmail.com', '', '202cb962ac59075b964b07152d234b70'),
(2, 2, 'subadmin', '', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(3, 3, 'freshfruitshop', 'Fresh Fruit Shop', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(4, 3, 'hahafoodshop', 'Haha Food Shop', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(5, 3, 'deliciousfruitshop', 'Delicious Fruit Shop', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(6, 3, 'dalatfruitstore', 'Đà Lạt Fruit Store', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(7, 3, 'citifruitstore', 'Citi Fruits Store', '', '', '', '', '202cb962ac59075b964b07152d234b70'),
(8, 3, 'nongsansachstore', 'Nông Sản Sạch Store', '', '', '', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `total_cart` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cate`, `name_cate`, `id_admin`) VALUES
(1, 'Trái cây nhập khẩu', 3),
(2, 'Nấm hữu cơ', 3),
(3, 'Rau sạch', 3),
(4, 'Rau quả hữu cơ', 4),
(5, 'Rau củ sạch', 4),
(6, 'Trái cây nhập khẩu', 4),
(7, 'Hoa Quả nhập khẩu ', 5),
(8, 'Trái cây nội địa', 5),
(9, 'Rau củ hữu cơ', 5),
(10, 'Các loại củ', 6),
(11, 'Rau lấy bông', 6),
(12, 'Rau gia vị - rau sống', 6),
(13, 'Trái cây vườn', 7),
(14, 'Cây ăn quả nhập khẩu', 7),
(15, 'Trái cây Đặc sản vùng miền', 7),
(16, 'Trái cây Việt Nam', 8),
(17, 'Cà chua các loại', 8),
(18, 'Trái cây Đặc sản vùng miền', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL,
  `cmt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `time_cmt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id_detail_bill` int(11) NOT NULL,
  `id_bill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_prd` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_prd` int(11) NOT NULL,
  `name_prd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_cate` int(11) NOT NULL,
  `img_prd_1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_prd_2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_prd_3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `quanlity` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_prd`, `name_prd`, `id_cate`, `img_prd_1`, `img_prd_2`, `img_prd_3`, `detail`, `cost`, `price`, `quanlity`, `view`, `id_admin`) VALUES
(1, 'Dâu tây Hàn Quốc 330g', 1, '03152023035127726100Rectangle 1.png', '03152023035127730900Rectangle 2.png', '03152023035127733700Rectangle 3.png', 'Dâu tây Hàn được mệnh danh là “nữ hoàng trái cây” của xứ sở Kim Chi, chinh phục người tiêu dùng bởi hương thơm tự nhiên, vị ngọt thanh cũng như vẻ ngoài và chất lượng vượt trội. Dâu tây Hàn Quốc là trái cây chủ lực của Hàn Quốc bên cạnh Dưa lê vàng, Hồng giòn Hàn Quốc hay các loại trái cây sấy khô và sữa trái cây khác. Hiện nay, dâu tây Hàn Quốc trở thành mặt hàng nông sản xuất khẩu chủ lực của Hàn Quốc tại 20 quốc gia như Hồng Kông, Singapore, Thái Lan,… Dâu tây Hàn đã được cấp phép nhập khẩu c', 399000, 399000, 20, 0, 3),
(2, 'Hồng giòn Hàn Quốc', 1, '03152023035411525100Rectangle 7.png', '03152023035411530100Rectangle 8.png', '03152023035411533800Rectangle 9.png', 'Hồng giòn Hàn Quốc là trái cây nhập khẩu trực tiếp từ xứ sở Kim Chi, có vị giòn tan, ngọt đậm ngon ngất ngây. Hồng giòn Hàn Quốc chắc chắn sẽ khiến bạn hài lòng. Hồng giòn Hàn Quốc có vị ngọt đậm, giòn tan, khối lượng từ 200 -300g/ trái. Được trồng theo phương pháp hữu cơ, trái có lớp vỏ siêu mỏng. Hồng giòn Hàn Quốc chứa nhiều vitamin, khoáng chất, chất béo, chất chống oxy hóa.. giúp tăng cường sức khỏe, tăng cường thị lực, ngăn ngừa lão hóa, phòng chống bệnh ung thư, hỗ trợ tiêu hóa và chống t', 299000, 299000, 25, 0, 3),
(3, 'Táo Ambrosia nhập khẩu Canada', 1, '03152023035752810300Rectangle 10.png', '03152023035752816400Rectangle 11.png', '03152023035752806300Rectangle 12.png', 'TÁO AMBROSIA CANADA đầu tiên được phát hiện ở một vườn tại thung lũng Simikameen, British Columbia, Canada – đây cũng là vùng trồng Ambrosia lớn nhất trên thế giới hiện nay nơi mà khí hậu đêm mát mẻ và ngày nắng ấm rất thuận tiện cho việc trồng táo, Táo am là một trong những sản phẩm hoa quả nhập khẩu được tiêu thụ rất mạnh tại thị trường Việt Nam. Loại táo này được đặt tên bởi Wilfrid Mennell và vợ những người đã phát hiện ra, có ý nghĩa là “thức ăn của các vị thần” để nói đến vẻ đẹp cũng như ', 100000, 99000, 30, 0, 3),
(4, 'Lê ngọt Singapo 1 thùng', 1, '03152023035925659300Rectangle 13.png', '03152023035925660700Rectangle 14.png', '03152023035925661800Rectangle 15.png', 'Giống lê Singo nhập khẩu Trung Quốc (có giấy chứng nhận nhập khẩu), là trái cây đảm bảo tiêu chuẩn xuất nhập khẩu toàn cầu. Bảo quản tươi ngon đến tận tay khách hàng. Lê singapo to tròn, vỏ màu vàng đậm, thịt bên trong trắng phau, ít hạt Lê có vị ngọt thanh mát, rất giòn và mọng nước. Trong quả lê có chứa nhiều chất xơ, vitamin C và vitamin K, vitamin PP, canxi, phốt-pho, betacaroten, axit folic rất tốt cho hệ tiêu hoá và hệ xương. Trong 100g lên Singo có chứa 57 calo. Giúp làm giảm lượng choles', 656000, 656000, 20, 0, 3),
(5, 'Xoài Cát Indo túi 1kg', 1, '03152023040133672200Rectangle 16.png', '03152023040133674300Rectangle 17.png', '03152023040133675700Rectangle 18.png', 'Xoài cát chu với hương thơm nồng nàn quyến rũ, là trái cây có vị ngọt đậm đà hấp dẫn khó chối từ. Xoài cát Indo ngọt nhất khi chín vàng, ấn nhẹ tay mềm nhưng chắc. Xoài chứa vitamin dồi dào cung cấp năng lượng, tăng cường đề kháng cho cơ thể khỏe mạnh. Xoài cát chu tươi ngon, chất lượng, trái to, da trơn. Xoài thoảng mùi hương thơm nồng nàn, nhẹ, khi ăn cảm nhận được vị ngọt thanh rất đậm đà. Xoài cát chu thường được ăn khi chín - khi trái chuyển màu vàng tươi có mùi thơm đặc trưng. Khi còn sống', 115000, 110000, 30, 0, 3),
(6, 'Nho mẫu đơn Hàn quốc', 1, '03152023040333813800Rectangle 5.png', '03152023040333815000Rectangle 4.png', '03152023040333816200Rectangle 6.png', 'Nho mẫu đơn Shine Muscat có xuất xứ từ Nhật Bản và được trồng tại Hàn Quốc. Đây là loại nho thường làm quà trong các dịp lễ, Tết của người có điều kiện trong những năm gần đây. Nho xanh mẫu đơn Shine Muscat được trồng ở Hàn Quốc theo phương pháp hữu cơ, hoàn toàn trồng trong nhà kính nên nho rất sạch, rất thơm ngon và có mùi vị thơm mát đặc biệt. Shine Muscat là kết quả của sự lai tạo giữa hai giống nho Akitsu-21 và Haku Nan, thực hiện bởi Viện Khoa học cây ăn quả quốc gia Nhật Bản từ những năm ', 1400000, 1300000, 15, 0, 3),
(7, 'Nấm hương túi 1kg', 2, '03152023040642239900Rectangle 3.png', '03152023040642243400Rectangle 2.png', '03152023040642248200Rectangle 1.png', 'Nấm hương là một loại nấm có mùi hương thơm đặc biệt từ chất adenine. Món ăn chế biến từ nấm này có hương vị thơm ngon. Không chỉ có mùi thơm hấp dẫn nấm hương còn chứa thành phần dinh dưỡng rất cao và hàm lượng protein phong phú. Trong nấm có đến 9 loại acid amin, sắt, vitamin B, Egosterol đều có thể chuyển hóa thành vitamin D có tác dụng ngăn ngừa thiếu máu, cao huyết áp và bệnh loãng xương rất tốt cho sức khỏe . Ngoài ra, nấm hương còn được chứng minh có tác dụng nâng cao khả năng miễn dịch c', 230000, 230000, 25, 0, 3),
(8, 'Nấm kim châm gói 150g', 2, '03152023040843721400Rectangle 6.png', '03152023040843722600Rectangle 5.png', '03152023040843723900Rectangle 4.png', 'Loại nấm này chứa hàm lượng lớn protein và chất xơ, có mùi vị thơm ngon và hấp dẫn. Ngoài ra, các chất xơ trong nấm giúp thúc dạ dày, đường ruột nhu động hoạt động tốt, qua đó phòng chống táo bón và béo phì hiệu quả. Đây là nấm tươi hoặc đóng hộp, với các chuyên gia khuyên dùng khi nấm tươi với mũ chắc, màu trắng, mũ bóng, và tránh dùng nấm có thân nhầy nhụa hoặc hơi nâu Loại nấm này theo truyền thống được sử dụng nấu món lẩu, nhưng cũng có thể được sử dụng cho món salad và các món ăn khác. Có t', 16000, 16000, 30, 0, 3),
(9, 'Nấm rơm túi 200g', 2, '03152023041001424200Rectangle 9.png', '03152023041001428000Rectangle 8.png', '03152023041001431700Rectangle 7.png', 'Là một loại nấm ăn được trồng phổ biến ở Việt Nam. Trong nấm rơm chữa hàm lượng Vitamin C cao gấp 6 lần so với hàm lượng vitamin C có trong cam quýt. Bên cạnh đó loại nấm này chứa hàm lượng protein cao, các chất béo không hòa tan, các loại đường, sắt, canxi, photpho, vitamin B. Hơn nữa, nấm rơm còn chứa hơn 7 loại acid amin và một loại protit khác có tác dụng đặc biệt trong việc ngăn chặn sự phát triển của tế bào ung thư, giúp phòng ngừa ung thư hiệu quả.', 30000, 30000, 26, 0, 3),
(10, 'Nấm tuyết gói 50g', 2, '03152023041117180800Rectangle 10.png', '03152023041117185200Rectangle 11.png', '03152023041117188700Rectangle 12.png', 'Nấm tuyết còn có tên là mộc nhĩ trắng được sử dụng nhiều trong các bài thuốc Đông y có tác dụng cầm máu, nhuận tràng, chữa ho, cải thiện não, bổ khí, nhuận phổi, ích ấm, tốt cho thận nằm trong top những loại thực phẩm bổ dưỡng nổi tiếng. Ngoài ra, nấm tuyết cũng được chứng minh có tac dụng làm đẹp, làm mờ vết thâm nám và bổ dưỡng dung nhan.  Nấm tuyết còn là thực phẩm được sử dụng rất nhiều trong các món ăn Việt Nam. Ngoài ra, nó được biết đến như một thực phẩm dưỡng sinh, có tác dụng bồi bổ sức', 30000, 30000, 18, 0, 3),
(11, 'Nấm bào ngư túi 300g', 2, '03152023041318059900Rectangle 15.png', '03152023041318061100Rectangle 13.png', '03152023041318062200Rectangle 14.png', 'Nấm bào ngư còn được biết với các tên gọi khác như: nấm sò, nấm trắng,… Loại nấm này thường mọc thành từng cụm xếp chồng lên nhau. Nấm thường sinh trưởng tốt trên thân cây gỗ, rơm rạ, mùn cưa,… Nấm bào ngư có hình dạng giống một chiếc phễu lệch. Phần mũ nấm xòe ra, lồi lên và mặt mũ nhẵn bóng, mép mũ cuộn vào trong. Mũ nấm có màu xám – nâu sẫm và màu trắng nhạt. Đây là 2 màu sắc đặc trưng của loại nấm này. Cuống nấm ngắn được phủ lông mịn có màu nhạt hơn phần mũ nấm, mọc sát nhau. chứa lượng lớn', 45000, 45000, 11, 0, 3),
(12, 'Mộc nhĩ đen túi 50g', 2, '03152023041455818300Rectangle 17.png', '03152023041455821200Rectangle 16.png', '03152023041455823900Rectangle 18.png', 'Các công trình nghiên cứu về tác dụng của mộc nhĩ đã chứng minh loại nấm này chứa hàm lượng protit cao gấp 6 lần sữa và hàm lượng không nhỏ canxi, photpho, sắt, chất xơ. Bên cạnh đó loại nấm này còn chứa các loại đường như mannan, glucose, xylose và cả lecithin, sterol ergot, vitamin C, vv. Mộc nhĩ có công dụng hiệu quả trong phòng chống xơ cứng động mạch. Nấm mộc nhĩ thường được thu hái vào mùa hè và mùa thu. Sau khi thu hái thì rửa sạch, cắt bỏ phần bẩn dính vào giá thể rồi mang đi phơi khô.', 24000, 24000, 25, 0, 3),
(13, 'Rau muống bó 300g', 3, '03152023041709346400Rectangle 2.png', '03152023041709351200Rectangle 3.png', '03152023041709355000Rectangle 1.png', 'Rau muống là loại giống cây thân thảo, mọc bò trên mặt nước hoặc trên đất bùn. Rau muống có thân dài, rỗng. Với giống rau muống mọc bò dưới nước, tại mỗi khớp sẽ có rễ ngắn bám xung quanh thân cây. Giá trị dinh dưỡng có trong rau muống gồm có Vitamin A, B, C, canxi, phospho, các chất dinh dưỡng và đặc biệt là hàm lượng chất sắt dồi dào, phù hợp với những người có thể trạng thiếu sắc, muốn bổ sung thêm sắt. Bên cạnh những công dụng như trên, ăn rau muống hợp lý có thể giúp cho mái tóc chắc khỏe, ', 15000, 15000, 30, 0, 3),
(14, 'Rau mồng tơi gói 500g', 3, '03152023041836497300Rectangle 4.png', '03152023041836498500Rectangle 5.png', '03152023041836499500Rectangle 6.png', 'Trong y học cổ truyền, dược liệu mồng tơi có tác dụng thanh nhiệt, giải độc, nhuận tràng, giảm đau, thông tiện. Chủ trị táo bón, ít sữa, tiểu buốt, tiểu rắt, đau mỏi xương khớp. Toàn cây được y học cổ truyền của Trung Quốc dùng điều trị bệnh lỵ, nhiễm trùng bàng quang, đau ruột thừa, bỏng, gãy xương, tổn thương ngoài da, đại tiện bí kết. Tại Ấn Độ, lá cây mồng tơi còn được dùng làm thuốc chữa bệnh lậu, mề đay, viêm bao quy đầu. Trong khi đó ở Thái Lan, dược liệu này cũng được dùng để chữa trị mộ', 14000, 14000, 24, 0, 3),
(15, 'Rau cải ngọt gói 300g', 3, '03152023041946739500Rectangle 9.png', '03152023041946740700Rectangle 8.png', '03152023041946742600Rectangle 7.png', 'Trong thành phần cải ngọt có chứa hàm lượng chất xơ lớn, cùng với các vitamin K, lipit,...bổ sung cho cơ thể dưỡng chất bảo vệ hệ tiêu hóa, nhất là ngăn ngừa táo bón tốt. Đồng thời chống các bệnh về tim mạch. Canxi trong cải ngọt cũng như các loại rau, củ, quả khác hỗ trợ chống loãng xương, giúp xương chắc khỏe. Phòng ngừa ung thư Trong cải ngọt cũng như các cây họ cải khác đều có chứa allyl isothiocyanate là chất hỗ trợ cơ thể ngăn ngừa các loại ung thư, hiệu quả nhất là ung thư phổi và ung thư', 15000, 15000, 30, 0, 3),
(16, 'Rau cải thìa gói 500g', 3, '03152023043121142800Rectangle 12.png', '03152023043121145700Rectangle 10.png', '03152023043121149900Rectangle 11.png', 'Cải thìa không chỉ là loại rau quen thuộc để chế biến nên những món ăn ngon mà còn chứa nhiều thành phần dinh dưỡng có lợi cho sức khỏe. Cải thìa tốt cho phụ nữ mang thai, có tác dụng phòng ngừa khuyết tật cho thai nhi, giúp xương chắc khỏe, có khả năng kích thích nhịp tim hoạt động tốt và hạ huyết áp. Cải thìa làm chậm quá trình lão hóa và giảm đáng kể việc hình thành các gốc tự do, có tác dụng phòng ngừa bệnh đục nhân mắt và thoái hóa hoàng điểm ở mắt đồng thời có tác dụng ngăn ngừa ung thư bằ', 20000, 18000, 23, 0, 3),
(17, 'Xà lách gói 500g', 3, '03152023043220378600Rectangle 13.png', '03152023043220383400Rectangle 14.png', '03152023043220387600Rectangle 15.png', 'Rau xà lách là cây thuộc họ cúc, còn được gọi rau diếp hoặc cải bèo từ thời xa xưa đã được biết đến như là một vị thuốc giúp thanh nhiệt, điều trị một số bệnh như táo báo và có tác dụng ngăn ngừa ung thư, viêm khớp, tim mạch… Rau xà lách tiếng anh là lettuce có tên khoa học khác là lactuca sativa được nhà thực vật người Thụy Điển Carl Linnaeus mô tả khoa học lần đầu tiên vào năm 1753. Đây là loại rau chuyên dùng để ăn sống, nhúng lẩu hoặc dùng để gói kèm với các loại thức ăn khác.', 21000, 21000, 12, 0, 3),
(18, 'Rau ngót bó 500g', 3, '03152023043331230000Rectangle 18.png', '03152023043331233100Rectangle 17.png', '03152023043331236500Rectangle 16.png', 'Theo Đông y, lá bù ngót có tác dụng giải độc, hoạt huyết, lợi tiểu và mát huyết. Trong khi đó, rễ rau ngót có công tiêu độc, chữa viêm phổi, ban sởi hoặc tiểu dắt, sốt cao. Còn theo Y học hiện đại, rau ngót có những tác dụng chính như: Thanh nhiệt: Rau ngót có công dụng giúp lợi tiểu, giải độc và làm mát cơ thể Giúp cải thiện đời sống tình dục: Hợp chất phytochemical có trong rau ngót có tác dụng làm tăng ham muốn tình dục. Chưa kể đến, sterol có trong rau ngót có công dụng như một loại hormone ', 18000, 18000, 30, 0, 3),
(19, 'Củ Dền KHC - 300gr', 4, '03152023045119088400Rectangle 1.png', '03152023045119093800Rectangle 2.png', '03152023045119097700Rectangle 3.png', 'Trong củ dền đỏ có chứa sắc tố màu betacyanin. Đây là hoạt chất có tác dụng giúp gan giải độc tốt hơn thông qua việc tạo hiệu ứng dây chuyền đến mạch máu giúp loại bỏ các độc tố trong gan. Tính năng này rất hiệu quả trong việc chữa lành độc tính của gan hoặc các bệnh gan mật, như: Vàng da, viêm gan, ngộ độc thực phẩm, tiêu chảy hoặc nôn mửa. Đồng thời, củ dền đỏ có khả năng chống sự hình thành các lớp mỡ trong cơ thể. Khi sử dụng củ dền đỏ làm nước ép hoặc bổ sung dền đỏ vào thực đơn hàng ngày s', 23800, 23800, 29, 0, 4),
(20, 'Baro Hành KHC - 200gr', 4, '03152023045214572000Rectangle 4.png', '03152023045214575600Rectangle 5.png', '03152023045214578400Rectangle 6.png', 'Hành baro (tỏi tây) hay còn được biết đến với tên gọi hành boa rô. Loại hành này có tên khoa học là Allium ampeloprasum var. Porrum, thuộc giống Porrum Group hay Allium ampeloprasum Leek Group. Tỏi tây cũng là một loại rau gia vị, giống như hành, tỏi, kiệu, thuộc Họ Hành. Hành baro là cây thân thảo, lá dài, dẹp. Phần củ và lá có mùi thơm, được dùng để chế biến thức ăn. Loại cây gia vị này được trồng bằng củ. Những bằng chứng khảo cổ tìm thấy tại lăng mộ Ai Cập cùng với các bức vẽ chưa đã cho thấ', 18000, 18000, 21, 0, 4),
(21, 'Cà rốt KHC – 500g', 4, '03152023045314631400Rectangle 7.png', '03152023045314635700Rectangle 8.png', '03152023045314639800Rectangle 9.png', 'Cà rốt được trồng đầu tiên ở Afghanistan vào khoảng năm 900 sau Công nguyên. Nhiều người biết đến cà rốt với màu cam rực rỡ đặc trưng, nhưng thực tế thì loại củ này cũng có các màu sắc khác, chẳng hạn như tím hoặc vàng, đỏ và trắng. Loại củ phổ biến và đa năng này có thể mang hương vị hơi khác nhau tùy thuộc vào màu sắc, kích thước và nơi trồng. Đường trong cà rốt tạo ra vị ngọt nhẹ, nhưng đôi khi cũng có thể mang mùi đất hoặc hơi đắng. Một khẩu phần nửa cốc cà rốt có: 25 calo, 6 gram carbohydra', 40000, 40000, 30, 0, 4),
(22, 'Cần Tàu Hữu Cơ - 100gr', 4, '03152023045418868000Rectangle 10.png', '03152023045418871600Rectangle 11.png', '03152023045418877000Rectangle 12.png', 'Rau cần tây (cần tàu) được nhiều người ăn kiêng lựa chọn vì chứa ít năng lượng. Khi ăn 100 g rau cần tây tươi, cơ thể bạn chỉ nạp thêm 16 kcal nhưng lại bổ sung được nhiều loại vitamin và khoáng chất. Rau cần tây không giúp giảm cân nhanh chóng mà chỉ hỗ trợ giảm cân bởi loại rau này chứa nhiều chất xơ và ít năng lượng (ít hơn cả rau muống). Điều đó có nghĩa là, khi dùng rau cần tây, bạn cũng cần kết hợp với chế độ ăn uống khoa học, hợp lý mới có thể giảm cân thành công.', 18000, 18000, 21, 0, 4),
(23, 'Xu hào KHC – 300g', 4, '03152023045558420400Rectangle 14.png', '03152023045558424100Rectangle 15.png', '03152023045558427400Rectangle 13.png', 'Su hào là một giống cây trồng thân thấp và mập của giống cải bắp dại, chúng được chọn lựa bởi thân mập và có dạng hình cầu, chứa nhiều nước. Su hào được tạo ra từ quá trình chọn lọc nhân tạo để lấy phần tăng trưởng của mô phân sinh ở thân (hay còn gọi là củ). Su hào được chia làm 4 loại đó là: Giống su hào trắng: Có đặc điểm là lá ngắn khoảng 30 - 40cm, có cọng dày như ngón tay, củ màu xanh nhạt hoặc màu trắng, đường kính khoảng 12 - 20cm. Giống su hào này cần khoảng 4 tháng mới có thể thu hoạch', 22500, 22500, 23, 0, 4),
(24, 'Cải dún HKC – 500g', 4, '03152023045717483100Rectangle 18.png', '03152023045717487500Rectangle 19.png', '03152023045717498600Rectangle 17.png', 'Trong rau cải xanh có chứa các chất chống stress oxy hóa như  vitamin E, vitamin C và các khoáng chất khác như beta carotene, flavonoid, lutein với hàm lượng dồi dào giúp cơ thể bảo vệ và chống oxy hóa do dư thừa các gốc tự do. Các gốc tự do là những phân tử không ổn định có thể làm hỏng các tế bào của cơ thể. Dài lâu sẽ dễ dẫn đến các tình trạng bệnh nghiêm trọng như bệnh tim, ung thư và bệnh Alzheimer. Thế nên việc ăn nhiều rau cải xanh có thể giúp bảo vệ khỏi các bệnh liên quan đến stress ', 47000, 47000, 30, 0, 4),
(25, 'Bạc hà xanh – 200g', 5, '03152023045832050100Rectangle 2.png', '03152023045832053200Rectangle 3.png', '03152023045832057800Rectangle 1.png', 'Bạc hà có chứa lượng nhỏ các dưỡng chất và khoáng chất như kali, magiê, canxi, phốt pho, vitamin C, sắt và vitamin A. Lá bạc hà có hàm lượng calo rất thấp – khoảng 25g lá tươi chỉ chứa 4 calo. Lá tươi chứa hàm lượng protein cùng chất béo không đáng kể, ngoài ra nó cũng chỉ chứa một ít carbohydrate. Một khẩu phần 25g bạc hà thông thường chứa tổng cộng chỉ 1g carbohydrate (trong đó đã bao gồm cả 0,5g chất xơ). Chất xơ chứa trong loại lá này có các tác dụng tốt cho sức khỏe như giúp và làm giảm ngu', 7200, 7200, 13, 0, 4),
(26, 'Bầu xanh – 500g', 5, '03152023050011597200Rectangle 6.png', '03152023050011602300Rectangle 4.png', '03152023050011606100Rectangle 5.png', 'Theo chuyên trang sức khỏe Boldsky, trái bầu không chỉ có hàm lượng nước cao mà còn cung cấp nhiều dưỡng chất, vitamin và khoáng chất thiết yếu cho sức khỏe như tinh bột, chất xơ, canxi, sắt, magiê, phốtpho, kali, natri, kẽm, vitamin C, vitamin B6… Dưới đây là những lợi ích bất ngờ mà loại trái quen thuộc này có thể mang đến cho sức khỏe của bạn', 16000, 16000, 30, 0, 4),
(27, 'Bí ngòi – 500gr', 5, '03152023050128135400Rectangle 8.png', '03152023050128138700Rectangle 9.png', '03152023050128142200Rectangle 7.png', 'Bí ngòi có tên khoa học là Zucchini, còn được gọi là Courgette, là một loại bí mùa hè trong họ thực vật Cucurbitaceae, cùng với dưa, bí spaghetti và dưa chuột. Nó có thể phát triển để đạt tới chiều dài hơn 3,2 feet (1 mét) nhưng thường được thu hoạch khi còn chưa trưởng thành - khi kích thước chưa tới 8 inch (20 cm). Mặc dù bí ngòi thường được coi là một loại rau, nhưng về mặt thực vật học, nó lại được phân loại là một loại trái cây. Bí ngòi cũng có nhiều giống nhận biết thông qua màu sắc, có mà', 20000, 20000, 20, 0, 4),
(28, 'Bí đỏ non – 500g', 5, '03152023050241631400Rectangle 10.png', '03152023050241635300Rectangle 12.png', '03152023050241638400Rectangle 11.png', 'Do bí đỏ non có hàm lượng beta-carotene rất cao nên tốt cho tim mạch, phát triển não bộ, tăng cường hệ miễn dịch, tốt cho sự phát triển của thai nhi, bổ mắt, phòng ngừa ung thư, tốt cho xương, ngăn ngừa loét dạ dày và tá tràng, giúp làm đẹp da, ngăn ngừa tiểu đường và hạt bí còn có tác dụng tẩy giun rất hiệu quả.', 15000, 14000, 21, 0, 4),
(29, 'Cà tím K7 500g', 5, '03152023050343344400Rectangle 13.png', '03152023050343347700Rectangle 14.png', '03152023050343350700Rectangle 15.png', 'Tác dụng của cà tím giảm nguy cơ mắc bệnh tim mạch. Cà tím có chứa kali, vitamin C và vitamin B6 là những chất chống oxy hóa có thể tăng cường sức khỏe tim mạch và giúp giảm nguy cơ mắc bệnh tim. Chống oxy hóa, ngăn ngừa ung thư,Kiểm soát lượng đường trong máu,Hỗ trợ quá trình giảm cân,Tăng cường chức năng trí não. Các khoáng chất (tính theo mg/100g) gồm: kali 220, phốt pho 15, magiê 12, calcium 10, lưu huỳnh 15, clor 15, sắt 0,5, mangan 0,2, kẽm 0,2, đồng 0,1, iod 0,002. Các vitatmin B1, B12, P', 14200, 14200, 30, 0, 4),
(30, 'Cà chua beef – 500g', 5, '03152023050428414000Rectangle 18.png', '03152023050428419100Rectangle 19.png', '03152023050428424400Rectangle 17.png', 'Cà chua được mệnh danh là một nhà máy dinh dưỡng vì nó cung cấp rất nhiều thành phần có lợi cho sức khỏe, ngay lập tức hãy cho cà chua vào thực đơn ăn uống của mình bạn nhé! Cà chua rất giàu vitamin A, C, K, vitamin B6, kali, folate, thiamin, magiê, niacin, đồng và phốt pho, là những vi chất cần thiết để duy trì một sức khỏe tốt. Điều tuyệt vời hơn ở cà chua là chúng chứa rất ít cholesterol, chất béo bão hòa, natri và calo. Bạn có thể ăn cà chua sống kẹp với b', 24000, 24000, 30, 0, 4),
(31, 'Dâu tây Đà lạt 330g', 6, '03152023050749149100Rectangle 1.png', '03152023050749150400Rectangle 2.png', '03152023050749151900Rectangle 3.png', 'Dâu tây Đà lạt được mệnh danh là “nữ hoàng trái cây” chinh phục người tiêu dùng bởi hương thơm tự nhiên, vị ngọt thanh cũng như vẻ ngoài và chất lượng vượt trội. Dâu tây đà lạt là trái cây chủ lực của đà lạt bên cạnh Dưa lê vàng, Hồng giòn hay các loại trái cây sấy khô và sữa trái cây khác.Hiện nay, dâu tây đà lạt trở thành mặt hàng nông sản xuất khẩu chủ lực của Việt Nam tại 20 tỉnh thành như thành phố HCM, Hà Nội, Cần thơ,… Dâu tây đà lạt đã được cấp phép xuất khẩu chính ngạch và được bày bán ', 200000, 200000, 21, 0, 4),
(32, 'Dưa hấu Nhật bản', 6, '03152023050853277600Rectangle 5.png', '03152023050853278900Rectangle 4.png', '03152023050853283000Rectangle 6.png', 'Dưa hấu có xuất xứ từ Nhật Bản và được trồng tại Hàn Quốc. Đây là loại dưa thường làm quà trong các dịp lễ, Tết của người có điều kiện trong những năm gần đây. Dưa hấu được trồng ở Hàn Quốc theo phương pháp hữu cơ, hoàn toàn trồng trong nhà kính nên dưa rất sạch, rất thơm ngon và có mùi vị thơm mát đặc biệt. Shine Muscat là kết quả của sự lai tạo giữa hai giống dưa Akitsu-21 và Haku Nan, thực hiện bởi Viện Khoa học cây ăn quả quốc gia Nhật Bản từ những năm 1997. Đến năm 2003, nó được đặt tên thư', 400000, 400000, 12, 0, 4),
(33, 'Hồng giòn Hàn Quốc', 6, '03152023050951582400Rectangle 7.png', '03152023050951586500Rectangle 9.png', '03152023050951590300Rectangle 8.png', 'Hồng giòn Hàn Quốc là trái cây nhập khẩu trực tiếp từ xứ sở Kim Chi, có vị giòn tan, ngọt đậm ngon ngất ngây. Hồng giòn Hàn Quốc chắc chắn sẽ khiến bạn hài lòng. Hồng giòn Hàn Quốc có vị ngọt đậm, giòn tan, khối lượng từ 200 -300g/ trái. Được trồng theo phương pháp hữu cơ, trái có lớp vỏ siêu mỏng. Hồng giòn Hàn Quốc chứa nhiều vitamin, khoáng chất, chất béo, chất chống oxy hóa.. giúp tăng cường sức khỏe, tăng cường thị lực, ngăn ngừa lão hóa, phòng chống bệnh ung thư, hỗ trợ tiêu hóa và chống t', 299000, 299000, 13, 0, 4),
(34, 'Táo Ambrosia nhập khẩu Canada', 6, '03152023051104334000Rectangle 10.png', '03152023051104337800Rectangle 11.png', '03152023051104343600Rectangle 12.png', 'TÁO AMBROSIA CANADA đầu tiên được phát hiện ở một vườn tại thung lũng Simikameen, British Columbia, Canada – đây cũng là vùng trồng Ambrosia lớn nhất trên thế giới hiện nay nơi mà khí hậu đêm mát mẻ và ngày nắng ấm rất thuận tiện cho việc trồng táo, Táo am là một trong những sản phẩm hoa quả nhập khẩu được tiêu thụ rất mạnh tại thị trường Việt Nam. Loại táo này được đặt tên bởi Wilfrid Mennell và vợ những người đã phát hiện ra, có ý nghĩa là “thức ăn của các vị thần” để nói đến vẻ đẹp cũng như ', 100000, 100000, 24, 0, 4),
(35, 'Lê ngọt Singapo 1 thùng', 6, '03152023051216147000Rectangle 14.png', '03152023051216150100Rectangle 15.png', '03152023051216153700Rectangle 13.png', 'Giống lê Singo nhập khẩu Trung Quốc (có giấy chứng nhận nhập khẩu), là trái cây đảm bảo tiêu chuẩn xuất nhập khẩu toàn cầu. Bảo quản tươi ngon đến tận tay khách hàng. Lê singapo to tròn, vỏ màu vàng đậm, thịt bên trong trắng phau, ít hạt Lê có vị ngọt thanh mát, rất giòn và mọng nước. Trong quả lê có chứa nhiều chất xơ, vitamin C và vitamin K, vitamin PP, canxi, phốt-pho, betacaroten, axit folic rất tốt cho hệ tiêu hoá và hệ xương. Trong 100g lên Singo có chứa 57 calo. Giúp làm giảm lượng choles', 656000, 656000, 28, 0, 4),
(36, 'Xoài Cát Indo túi 1kg', 6, '03152023051327809100Rectangle 18.png', '03152023051327812800Rectangle 17.png', '03152023051327817800Rectangle 19.png', 'Xoài cát chu với hương thơm nồng nàn quyến rũ, là trái cây có vị ngọt đậm đà hấp dẫn khó chối từ. Xoài cát Indo ngọt nhất khi chín vàng, ấn nhẹ tay mềm nhưng chắc. Xoài chứa vitamin dồi dào cung cấp năng lượng, tăng cường đề kháng cho cơ thể khỏe mạnh. Xoài cát chu tươi ngon, chất lượng, trái to, da trơn. Xoài thoảng mùi hương thơm nồng nàn, nhẹ, khi ăn cảm nhận được vị ngọt thanh rất đậm đà. Xoài cát chu thường được ăn khi chín - khi trái chuyển màu vàng tươi có mùi thơm đặc trưng. Khi còn sống', 110000, 100000, 30, 0, 4),
(37, 'Táo Envy Size 24 Mỹ', 7, '03152023140510456000image 3.png', '03152023140510460200image 2.png', '03152023140510461200image 1.png', 'Nhập khẩu trực tiếp từ Mỹ.Táo Envy Mỹ là giống táo ngon nhất thế giới.Khi ăn, táo có mùi thơm đậm, ăn cảm giác rất ngọt và thanh mát.Chứa nhiều chất dinh dưỡng như B1, B2, Vitamin C, Canxi,…Táo giúp nạp ít lượng calo, phù hợp để giảm cân.Táo Envy chứa nhiều vitamin nhóm B như: B1, B2… là những dưỡng chất có lợi cho não duy trì bộ não khỏe mạnh và sáng suốt.', 350000, 349999, 30, 0, 5),
(38, 'Cam Vàng Mafa Ai Cập', 7, '03152023141039274600image 4.png', '03152023141039275700image 5.png', '03152023141039277900image 6.png', 'Cam vàng Ai Cập có màu sắc vàng tươi, quả to, mọng nước, có mùi thơm rất đặc trưng. Giống Cam Ai Cập mà VinFruits nhập khẩu về Việt Nam là cam Daltex – loại cam ngon nhất của đất nước Kim tự tháp.Cam có thể được bảo quản ở nhiệt độ thường hoặc trong tủ lạnh. Nếu bảo quản trong tủ lạnh, nhiệt độ thích hợp nhất từ 7oC – 10oC. Đối với cả hai phương pháp bảo quản, cam thường sẽ tươi được trong khoảng 2 tuần và sẽ giữ được độ tươi cùng hàm lượng vitamin.Cách tốt nhất để bảo quản cam là để tự nhiên th', 139000, 119000, 16, 0, 5),
(39, 'Táo Xanh Granny Smith Mỹ', 7, '03152023141108180700image 10.png', '03152023141108182000image 11.png', '03152023141108183000image 12.png', 'Táo Xanh hay còn gọi với tên quốc tế là Granny Smith được nhập khẩu từ Mỹ là loại trái cây đạt chuẩn chất lượng cả về mẫu mã và hương vị, thích hợp để sử dụng trong gia đình hoặc làm quà biếu tặng cực kỳ sang trọng và lịch sự.Táo xanh có nguồn gốc từ trang trại ở Eastwood, New South Wasles, Úc năm 1868 và chính thức được công bố ra thị trường năm 1924. Táo xanh Granny Smith du nhập và được trồng thương mại tại Mỹ bắt đầu từ cuối năm 1960.Đây là một trong những giống táo được trồng phổ biến nhất', 145000, 145000, 24, 0, 5),
(40, 'Nho kẹo Mỹ không hạt', 7, '03152023141208367700image 8.png', '03152023141208368700image 7.png', '03152023141208369400image 9.png', 'Nho kẹo Mỹ được trồng tại vùng đất có nhiệt độ chênh lệch giữa ngày và đêm từ 2-3 độ. Trồng ở vùng trung du ít sương, thu hoạch vào cuối tháng 8 và đầu tháng 9 hằng năm.Nho được gắn cái tên là KẸO bởi nó có hương vị ngọt lịm thơm lừng của tuổi thơ. Vị ngọt mà bất cứ ai điều cũng thích thú và cuốn hút. Vị ngọt của nho KẸO không hẳn là vị ngọt đơn thuần, mà nó chứa vị của tiềm thức trẻ tuổi vị của nhớ nhung.Cũng giống như các loại nho khác. Nho kẹo được cửa hàng bảo quản ở nhiệt độ từ 0-4 độ để gi', 299000, 299000, 15, 0, 5),
(41, 'Lê nhập khẩu Hàn Quốc', 7, '03152023141256143700image 13.png', '03152023141256145500image 14.png', '03152023141256146500image 15.png', 'Lê Hàn Quốc còn có tên gọi khác là Pyrus Pyrifolia hay lê Châu Á, lê Cát,.. Lê Hàn Quốc là loại trái cây nhập khẩu và được ưa chuộng tại Việt Nam. Những dịp lễ, tết, người ta thường mua lê Hàn Quốc để biếu cho nhau.Đây là loại trái cây có nguồn gốc từ xứ sở kim chi và được trồng nhiều ở Nachi. Lê Hàn Quốc trong và to lớn hơn nhiều, trọng lượng từ 600 – 800g/quả.Lê giúp giảm cân hiệu quả, tăng sức đề kháng, cung cấp năng lượng, giảm nguy cơ đột quỵ, bảo vệ sức khỏe tim mạch.Hỗ trợ xương chắc khỏe', 199000, 199000, 30, 0, 5),
(42, 'Việt Quất Mỹ Nhập Khẩu', 7, '03152023141336589300image 17.png', '03152023141336590300image 18.png', '03152023141336591300image 16.png', 'Quả Việt quất hay còn gọi là Blueberry, có hình dạng khá giống với quả sim của Việt Nam, quả có màu đậm, gần như đen với một chút ánh tím, thịt bên trong có màu đỏ hoặc ngã tím.Quả Việt quất được phát hiện bởi người bản địa tại các khu rừng ở Bắc Mỹ, Mỹ. Đây là nước có sản lượng Blueberry nhiều nhất trên thế giới.Quả Việt quất Mỹ trồng nhiều nhất tại bang Oregon, Washington, California.Quả Việt quất có nhiều chất bổ dưỡng giúp cơ thể chống lại nhiều bệnh tật và mang đến những dưỡng chất cần thiế', 145000, 145000, 24, 0, 5),
(43, 'Bưởi da xanh bến tre', 8, '03152023141444820300image 19.png', '03152023141444821300image 20.png', '03152023141444822100image 21.png', 'Bưởi da xanh không chỉ được nhiều người yêu thích bởi vị ngon và ngọt thanh, màu sắc đẹp mắt mà còn là một trong những loại trái cây cực tốt cho sức khoẻ với nhiều công dụng thần kỳ khác nhau đã được khoa học chứng minh. Bưởi da xanh Bến Tre chính gốc loại 1 có nhiều nước, có vị ngọt thanh, không chua và không đắng, bưởi có mùi thơm đặc trưng, khá ít hạt hoặc không hạt.Bưởi da xanh chứa nhiều vitamin và khoáng chất, không chỉ là món ăn ngon, bổ dưỡng mà còn chứa nhiều công dụng khác nhau trong v', 50000, 45000, 29, 0, 5),
(44, 'Thanh long ruột đỏ 1kg', 8, '03152023141633500900image 22.png', '03152023141633501600image 23.png', '03152023141633502200image 24.png', 'Thanh long đỏ có đặc tính hoàn toàn khác so với loại thanh long trắng. Thành phần dinh dưỡng có trong thanh long ruột đỏ được cho là gấp đôi so với thanh long ruột trắng. Đây là một trong những loại trái cây nội địa có thành phần dinh dưỡng phù hợp nhất cho việc giữ gìn dáng vóc và sắc đẹp của phụ nữ.Thanh long là một loại trái cây được rất nhiều người yêu thích bởi vị ngọt thanh, chứa nhiều protein, các nhóm vitamin B2, B3, C và chứa nhiều sắt, kali, phốt pho… giúp tăng cường sức khỏe, mang lại', 30000, 25000, 14, 0, 5),
(45, 'Dưa hấu ruột vàng 1kg', 8, '03152023141725099800image 27.png', '03152023141725100500image 26.png', '03152023141725102300image 25.png', 'Dưa hấu ruột vàng có nguồn gốc từ Châu Phi, thuộc họ bầu bí. Loại dưa hấu này có vỏ mỏng, cứng, ruột nhiều nước nên thường được lựa chọn để giải nhiệt.Dưa hấu ruột vàng là loại cây chịu nhiệt cực kì tốt, khả năng kháng sâu bệnh cao, dễ trồng dễ chăm nên có thể trồng quanh năm và cho hiệu suất cao. Dưa hấu vỏ xanh ruột vàng có vỏ mỏng hơn so với loại dưa đỏ truyền thống nhưng dai và cứng, quả có màu xanh sáng. Thịt dưa hấu vàng ươm. Khác với dưa hấu đỏ, dưa hấu ruột vàng được đánh giá là có vị ng', 30000, 30000, 30, 0, 5),
(46, 'Dưa lưới hoàng kim 500g', 8, '03152023141814013500image 30.png', '03152023141814014200image 29.png', '03152023141814014800image 28.png', 'Trái dưa được trồng hoàn toàn theo tiêu chuẩn Vietgap, đủ điều kiện để xuất khẩu.Dưa Hoàng Kim có lớp vỏ ngoài màu vàng đậm và những đường gân đặc trưng của dưa lưới, ruột vàng nhạt và có hạt.Vỏ mỏng, ruột dày, hương thơm nhẹ, loại dưa này có độ giòn cao và độ ngọt chuẩn. Khi ăn giòn tan trong miệng thực sự rất sảng khoái.Dưa lưới là một nguồn tuyệt vời của Vitamin A, B6 và C, và kali. Nó cũng là một nguồn rất tốt của chất xơ, folate, niacin, axit pantothenic và thiamine.', 119000, 10498, 19, 0, 5),
(47, 'Chôm chôm giống Thái Lan', 8, '03152023141856543700image 31.png', '03152023141856544400image 32.png', '03152023141856546800image 33.png', 'Cơm dày, dễ tróc hạt, thịt giòn nhẹ, không quá khô.Khi chín râu trái có màu xanh, vỏ có màu đỏ, xen chấm vàng.Chứa nhiều vitamin A, B, C cùng với khoáng chất như kali, canxi, magie, photpho...Có tác dụng chống oxy hóa, nhuận tràng, tăng sức đề kháng, ngăn ngừa ung thư', 70000, 59500, 22, 0, 5),
(48, 'Xoài cát chu lai 1kg', 8, '03152023142001772100image 36.png', '03152023142001772900image 34.png', '03152023142001773500image 35.png', 'Đặc điểm sản phẩm: Ít xơ, vị ngọt ngào nhưng không gắt và hương thơm nồng nàn quyến rũ..Thông tin sản phẩm.Phòng tránh thoái hóa điểm vàng của mắt.Chống ung thư.Giúp chắc xương.Tốt cho người bị tiểu đường.Giúp cho hệ tiêu hóa.Giảm nguy cơ bị bệnh tim.Chống hen suyễn.Tóc và da khỏe đẹp', 110000, 105500, 23, 0, 5),
(49, 'Cải bó xôi hữu cơ', 9, '03152023142116181700image 38.png', '03152023142116182600image 39.png', '03152023142116183300image 37.png', 'Trong rau cải bó xôi có một loại hóa chất steroid tên khoa học là phutoecdy có tác dụng thúc đẩy sự sản xuất protein tự nhiên trong cơ thể lên tới 20%. Rau rất giàu thành phần beta carotene, canxi, tốt cho xương và răng.Carotenoid trong cải bó xôi có khả năng phòng và ngừa ung thư tiền liệt tuyến.Ngoài ra, cải bó xôi chứa nhiều chất kaempferol giúp giảm thiểu nguy cơ ung thư buồng trứng.Cải bó xôi không chỉ giàu vitamin K, mà còn chứa cả mage, đây là một dưỡng chất tuyệt vời trong việc tạo xương', 45000, 44998, 23, 0, 5),
(50, 'Ớt chuông đỏ hữu cơ', 9, '03152023142209290000image 41.png', '03152023142209291700image 42.png', '03152023142209293200image 40.png', 'Ớt chuông đỏ chứa lượng lớn vitamin C rất rốt cho hệ miễn dịch, tăng cường sức khỏe.Ớt chuông rất giàu Vitamin A, K, C, Kali, Magne, chất khoáng và chất xơ có tác dụng hỗ trợ tiêu hóa, tốt cho mắt, hệ miễn dịch cao, giảm đường và cholesterol trong máu.Ăn ớt chuông còn giúp kích thích tuần hoàn máu, ngăn ngừa lão hóa.Ngoài việc kích thích ngon miệng, nó còn bổ sung canxi và ngăn chặn ung thư khá cao', 40000, 37500, 23, 0, 5),
(51, 'Củ cải đỏ hữu cơ', 9, '03152023142347581200image 45.png', '03152023142347580300image 43.png', '03152023142347578200image 44.png', 'Lượng dinh dưỡng trong củ cải đỏ bao gồm: giàu vitamin C, chất chống oxy hóa, sắt, chất xơ, magiê, beta-carotene, bioflavonoids, kali và mangan. Củ cải đỏ làm giảm tính nóng của một số thực phẩm, giúp thanh nhiệt cho cơ thể, trị ho, nhiệt miệng.Bên trong củ cải đỏ chứa nhiều chất sắt, tốt cho máu.Các vitamin, magiê và bioflavonoid trong củ có tác dụng tăng cường thị lực.Nghiên cứu cho thấy, uống nước ép củ cải đỏ giúp làm tăng lượng nitrate lên gấp đôi trong máu, giảm sự hấp thụ oxy của cơ bắp v', 60000, 58500, 30, 0, 5),
(52, 'Củ dền đỏ hữu cơ', 9, '03152023142459046700image 48.png', '03152023142459045800image 47.png', '03152023142459043800image 46.png', 'Củ dền cung cấp đáng kể các loại vitamin A, B1, B2, C, sắt, choline, mangan, nitrogen, natri hữu cơ, kali, chất xơ và đường đơn tự nhiên.Chất xơ trong củ dền rất tốt trong điều trị táo bón.Lượng vitamin dồi dào góp phần tăng cường sức đề kháng cho cơ thể.Hàm lượng chất sắt cao có tính bổ máu, giúp cải thiện tình trạng của bệnh nhân thiếu máu, xơ vữa động mạch.Chất choline giúp bài trừ độc tố ở gan hiệu quả.Nitrogen có tác dụng giãn thần kinh.', 70000, 70000, 19, 0, 5),
(53, 'Bí đỏ non hữu cơ', 9, '03152023142636405800image 51.png', '03152023142636406700image 49.png', '03152023142636407400image 50.png', 'Là loại rau an toàn và thường được hái non. Bí đỏ non thường được chọn làm nguyên liệu để chế biến các món canh tuyệt hảo trong gia đình. Đặc biệt, bí khá dễ làm vì có thể ăn cả vỏ, thích hợp cho cả những người bận rộn.Tiêu chuẩn &amp; chứng nhận chất lượng:Chuẩn hữu cơ USDA (Hoa Kỳ).Chuẩn hữu cơ EU Organic (Châu Âu).Chuẩn hữu cơ JAS (Nhật Bản)', 50000, 45000, 30, 0, 5),
(54, 'Đậu cove Nhật hữu cơ', 9, '03152023142744515400image 53.png', '03152023142744516900image 52.png', '03152023142744517800image 54.png', 'Đậu cove cung cấp một lượng protein tự nhiên rất lớn. Khi chế biến món ăn đúng cách, protein này sẽ giúp bạn điều chỉnh lượng đường trong máu. Loại đậu này đặc biệt có ích cho bệnh nhân tiểu đường và người mắc bệnh đường huyết.Với những người dễ mắc bệnh về đường tiêu hóa thì đậu cove là một sự lựa chọn tuyệt vời. Chúng không những rất giàu chất xơ, có lợi nhuận tràng mà còn giúp giảm cholesterol trong máuĐậu cove giúp tim khỏe mạnh do có chứa axit folic. Đây là thực phẩm an toàn cho những bệnh ', 39000, 37500, 23, 0, 5),
(55, 'Khoai lang mật bịt 500g', 10, '03152023143423572500image 56.png', '03152023143423573400image 55.png', '03152023143423574000image 57.png', 'Khoai lang có vị ngọt nhưng không làm tăng lượng đường huyết, mệt mỏi hay tăng cân. Đường tự nhiên trong khoai lang sẽ từ từ thẩm thấu vào máu, giúp cân bằng nguồn năng lượng cho cơ thể.Khoai lang là nguồn cung cấp chất xơ rất tốt, giúp duy trì đường huyết ở mức cân bằng.Khoai lang là thực phẩm giàu protein. Protein trong khoai lang rất đặc biệt do khả năng ức chế ung thư ruột kết và trực tràng ở người. Hàm lượng protein trong khoai lang càng cao ', 18000, 16000, 30, 0, 6),
(56, 'Cà rốt sạch Đà Lạt', 10, '03152023143554603400image 60.png', '03152023143554604200image 58.png', '03152023143554605800image 59.png', 'Cà rốt Còn gọi là củ cải đỏ, hồ la bặc.Theo đông y Cà rốt có tính bình, không độc, vào các kinh thủ âm phế và túc thái âm tỳ. Có tác dụng khoan trung hạ khí, yên ngũ tạng, tăng cường tiêu hóa, dùng chữa các chứng suy dinh dưỡng, tả lỵ lâu ngày.Dùng trong đông y như: chữa trẻ bị tiêu chảy, trẻ nhỏ bị lên sởi, ho gà, táo bón, cao huyết áp......', 20000, 19000, 23, 0, 6),
(57, 'Khoai tây Đà Lạt 500g', 10, '03152023143637470100image 61.png', '03152023143637471300image 62.png', '03152023143637473000image 63.png', 'Củ Khoai tây vị ngọt, tính bình .Tác dụng bổ khí, kiện tỳ, tiêu viêm. Củ khoai tây chữa khó tiêu, đau bụng, viêm loét dạ dày, viêm tuyến nước bọt, say nắng, sốt, bỏng nhẹ, eczema, vết thương.Khoai tây còn chứa một lượng lớn cacbonhydrat, giúp duy trì lượng glucozơ trong máu, khiến cho não bộ có thể làm việc tốt hơn. Ngoài ra, kali làm giãn mạch máu, đảm bảo rằng não bạn sẽ nhận được đủ máu.Khoai tây rất tốt cho tim. Chất xơ giúp làm giảm cholesterol trong các mạch máu, vitamin C và B6 giúp giảm ', 23000, 20000, 12, 0, 6),
(58, 'Su hào đà lạt 500g', 10, '03152023143721163600image 65.png', '03152023143721164300image 64.png', '03152023143721164900image 66.png', 'Su hào còn gọi là phiết làn, giới lan, giá liên, ngọc man thanh. Su hào hay xu hào là một giống cây trồng thân thấp và mập của cải bắp dại, được chọn lựa vì thân mập, gần như có dạng hình cầu, chứa nhiều nước của nó. Su hào được tạo ra từ quá trình chọn lọc nhân tạo để lấy phần tăng trưởng của mô phân sinh ở thân, mà trong đời thường được gọi là củ. Nguồn gốc tự nhiên của nó là cải bắp dại.Su hào có tính mát, vị ngọt hơi đắng, có tác dụng hóa đờm, giải khát, giải độc, lợi thủy, tiêu viêm, giúp d', 12000, 12000, 21, 0, 6),
(59, 'Củ cải trắng Đà Lạt', 10, '03152023143818428200image 69.png', '03152023143818428900image 68.png', '03152023143818429400image 67.png', 'Củ cải trắng là củ của cây cải, màu trắng để phân biệt sự khác nhau với củ cải đỏ. Ngoài ra cò được gọi là củ cải, lu bú, tiếng Hán gọi là lai bặc hay củ cải muối thì được người Hoa gọi là xá bấu.Theo đông y củ cải có vị ngọt, hơi cay, đắng, tính bình, không độc, có tác dụng làm long đờm, trừ viêm, tiêu tích, lợi tiểu, tiêu ứ huyết, tán phong tà, trừ lỵ. Nó giúp khai vị, làm ăn ngon miệng, chống hoại huyết, chống còi xương, sát khuẩn nói chung, lọc gan và thận. Củ khô cũng làm long đờm', 50000, 40000, 21, 0, 6),
(60, 'Củ hành tím bịt 300g', 10, '03152023143918079600image 70.png', '03152023143918080600image 71.png', '03152023143918081400image 72.png', 'Tác dụng củ hành tím: Đau tai: Bạn bị đau tai và cảm thấy nhức nhối không thể chịu đựng được? Đừng lo, bởi chỉ cần một củ hành là đủ để làm cơn đau phải tan biến. Hành có tác dụng kháng viêm và làm suy yếu các vi khuẩn gây ra cơn đau. Vì vậy, nếu lần tới bạn đau tai, hãy cắt lấy phần “lõi” ở trên trong củ hành đặt vào tai, bạn sẽ nhanh chóng cảm thấy dễ chịu trở lại.Cảm lạnh: Cũng giống như tỏi, hành tím có tác dụng tăng cường hệ miễn dịch. Uống một cốc nước hành sẽ giúp bạn phục hồi nhanh hơn m', 23000, 17000, 29, 0, 6),
(61, 'Bông cải xanh Đà Lạt', 11, '03152023152015458500image 75.png', '03152023152015461400image 74.png', '03152023152015462700image 73.png', 'Bông cải xanh là một loại rau xanh có hình dạng giống một cái cây thu nhỏ. Nó thuộc về loài thực vật được gọi là Brassica oleracea, cùng gia đình cải xoăn và súp lơ và đều chung họ rau cải.Một trong những lợi ích lớn nhất mà bông cải xanh mang lại chính là hàm lượng các chất thiết yếu cao. Lượng vitamin, khoáng chất, chất xơ và một số hợp chất sinh học có trong bông cải xanh rất tốt cho sức khỏe. Bông cải xanh chứa nhiều vitamin C, vitamin A, vitamin K, vitamin B9 (Folate) và một số khoáng chất ', 18000, 16000, 13, 0, 6),
(62, 'Bông bí đà lạt 500g', 11, '03152023152124430500image 76.png', '03152023152124433200image 77.png', '03152023152124434400image 78.png', 'Bông Bí hay còn được gọi là hoa bí đỏ, hoa bí ngô là hoa của cây bí đỏ – Loại cây cho trái bí đỏ cũng được sử dụng làm nguyên liệu nấu ăn rất phổ biến. Ngoài lợi ích đa dạng trong việc có thể chế biến ra nhiều món ăn ngon, Bông Bí còn là vị thuốc quý trong Đông y, đã được sử dụng làm thuốc từ rất lâu đời. Đó chính là lý do khiến loài hoa này vô cùng nổi tiếng trong dân gian. Tuy nhiên, không phải ai cũng biết hoa bí vàng ở các quốc gia Châu Âu lại là nguyên liệu cho những món ăn thuộc hàng thượn', 38000, 38000, 30, 0, 6),
(63, 'Bông Atiso đà lạt 500g', 11, '03152023152205666700image 81.png', '03152023152205669200image 80.png', '03152023152205670600image 79.png', 'Bông Atisô tươi là một trong những đặc sản nổi tiếng và đặc trưng nhất của Đà Lạt. Trong hoa atiso chứa hàm lượng dinh dưỡng cao có nhiều công dụng cho sức khỏe người sử dụng. Hoa Atiso Đà Lạt có vị ngọt đắng, tính mát, không độc chứa hàm lượng dinh dưỡng cao nên rất tốt cho sức khỏe. Ngoài được sử dụng hãm pha giống trà thì chúng còn được dùng như một món ăn bổ dưỡng cho sức khỏe.Lợi ích của Atiso đối với sức khỏe.Cải thiện chức năng gan.Có nhiều chất chống oxy hóa', 110000, 100500, 14, 0, 6),
(64, 'Bông thiên lí sạch 300g', 11, '03152023152551287700image 84.png', '03152023152551287000image 82.png', '03152023152551286200image 83.png', 'Cây thiên lý thường được nhân dân trồng làm cảnh và lấy hoa, lá nấu canh ăn, vừa là món ăn ngon lại có tác dụng giải nhiệt, phòng ngừa rôm sảy, mụn nhọt và chữa mất ngủ.Theo Đông y, hoa thiên lý có vị ngọt tính bình có tác dụng bồi bổ, thanh nhiệt, giải độc, phòng chống rôm sảy và nâng cao sức khỏe, là một vị thuốc an thần, điều trị chứng mất ngủ. Lá thiên lý có tác dụng giảm đau nhức xương khớp; sát trùng, kháng viêm, chống lở loét, kích thích lên da non,...', 46000, 45000, 30, 0, 6),
(65, 'Bông điên điển sạch 300g', 11, '03152023152502107600image 88.png', '03152023152502108500image 89.png', '03152023152502109000image 90.png', 'Cây điên điển còn gọi là muồng rút, điền thanh bụi, điền thanh hạt tròn, điền thanh đầm lầy, điền thanh lưu niên, điền thanh thân tia.Lá điên điển nấu nước để uống, được xem như chất tẩy xổ, làm giảm đau, trục giun sán và kháng sinh, chống viêm sưng. Kem hay thuốc mỡ bào chế từ lá điên điển dùng để chữa trị ngứa, phát ban ở da.Thuốc dán bào chế từ lá điên điển thúc đẩy sự nung mủ, làm mủ những nhọt đầu đinh, ung mủ, áp-xe, viêm sưng thấp khớp', 36000, 35000, 27, 0, 6),
(66, 'Bông súng Đà Lạt 300g', 11, '03152023152639453800image 87.png', '03152023152639454500image 86.png', '03152023152639455000image 85.png', 'Hoa súng là loại cây sống ở dưới nước, mọc hoang trong các hồ ao ruộng nước và thường được trồng làm cảnh và lấy cuống hoa, củ làm thức ăn. Không phải ngẫu nhiên mà người ta cho rằng, hoa súng có tác dụng hơn Viagra thời nay mà bởi vì giá trị dinh dưỡng có trong chúng quá nhiều. Cụ thể gồm: Giàu Nuciferine C19 H21 NO2 – đây là Alkaloid có nhiều trong hoa sen (một axit amin có nguồn gốc tự nhiên). Chất này thường dùng để điều trị chứng bất lực sinh lý ở nam và nữ giới.', 13000, 10500, 30, 0, 6),
(67, 'Ngò tây đà lạt 200g', 12, '03152023152750810600image 91.png', '03152023152750812600image 92.png', '03152023152750814300image 96.png', 'Ngò gai hay còn gọi là mùi tàu, mùi gai hoặc ngò tây (tiếng địa phương), hồ tuy, thích nguyên tuy, dương nguyên tuy và sơn nguyên tuy.Theo Đông y, ngò gai có vị cay hơi đắng, thơm hắc, tính ấm, có tác dụng sơ phong thanh nhiệt, kiệm tỳ, hành khí tiêu thũng, giảm đau, có tác dụng thông khí, khử thấp nhiệt, thanh độc, kích thích tiêu hóa, tiệm tỳ. Ngò gai chứa 0,02 – 0,04% tinh dầu bay hơi, rễ chứa saponin…, Thường có mặt trong các bài thuốc trị cảm mạo, đau tức ngực, rối loạn tiêu hóa, viêm ruột ', 10000, 8000, 30, 0, 6),
(68, 'Lá tía tô sạch 200g', 12, '03152023152910730000image 97.png', '03152023152910730900image 98.png', '03152023152910731400image 99.png', 'Tía tô còn gọi là é tía, tên trong tiếng Hán là tử tô, Tô ngạnh, Tô diệp, xích tô (gọi là tử, xích tía vì cây có màu tím). Không nhầm với tía tô tử là hạt của cây tử tô (thận trọng khi viết hai tên này là của 2 vị thuốc không hoàn toàn giống nhau đều cùng lấy từ một cây).Cây tía tô có chứa chất tinh dầu perillaldehyd (4 isopropenyl 1-cyclohexen 7-al), limonen, a-pinen và dihydrocumin. Hạt có dầu béo gồm acid oleic, linoleic và linolenic; acid amin: arginin, histidin, leucin, lysin, valin  (l-sab', 9000, 8000, 23, 0, 6),
(69, 'Rau hung quế sạch 200g', 12, '03152023152952564700image 100.png', '03152023152952565600image 101.png', '03152023152952566300image 102.png', 'Húng quế  ở Việt Nam có các tên còn gọi là rau quế, é quế, húng giổi, húng dổi, húng chó, é trắng hay húng lợn, Húng quế Việt Nam có mùi dịu nhẹ hơn khác với Húng quế Tây hay quế châu Âu (sweet basil), còn gọi là quế ngọt, quế Tây, húng Tây rất thơm, mùi hăng đậm, ngọt và mát.Trong cây húng quế có từ 0,4 đến 0,8% tinh dầu và có hàm lượng cao nhất lúc cây đã ra hoa. Tinh dầu có mùi thơm của Sả và Chanh. Trong tinh dầu có linalol (60%), cineol, estragol methyl – chavicol (25-60-70%) và nhiều chất ', 11000, 11000, 30, 0, 6),
(70, 'Rau diếp cá sạch 300g', 12, '03152023153107681800image 104.png', '03152023153107704100image 103.png', '03152023153107705400image 105.png', 'Thành phần có trong cây diếp cá tính theo g% như sau: Nước 91,5; protid 2,9; glucid 2,7, lipit 0,5, cellulose 1,8, dẫn xuất không protein 2,2, khoáng toàn phần 1,1 và theo mg%: calcium 0,3, kali 0,1, caroten 1,26, vitamin C 68. Trong cây có tinh dầu mà thành phần chủ yếu là methylnonylketon, decanonylacetaldehyde và một ít alcaloid là cordalin, một hợp chất sterol v.v... Trong lá có quercitrin (0,2%); trong hoa và quả có isoquercitrin.Theo đông y, diếp cá vị cay, chua, mùi tanh, tính mát (hơi lạ', 13000, 12000, 23, 0, 6),
(71, 'Rau hương thảo 100g', 12, '03152023153407419700Rectangle 20.png', '03152023153407420400Rectangle 21.png', '03152023153407421800Rectangle 22.png', 'Cây Rosemary hay còn được gọi là cây Hương Thảo, Cây  Tây  Dương  Chổi, …Theo Đông y, hương thảo có vị chát, mùi thơm nồng, tính ấm nóng, tác dụng bổ dưỡng, tăng cường sinh lực, hoạt huyết, tẩy uế trọc, kích thích hoạt động của hệ tiêu hóa, lợi mật, lợi tiểu, nhuận trường, chống viêm sưng, chống oxy hóa, kích thích tuần hoàn máu lên não, giúp tăng cường trí nhớ và sự tập trung, giúp chống rụng tóc và mau mọc tóc, giúp khử trùng đường hô hấp và làm long đàm, dễ khạc đàm.', 31000, 30000, 28, 0, 6),
(72, 'Rau ôm đà lạt 200g', 12, '03152023153452455100image 109.png', '03152023153452456900image 110.png', '03152023153452457800image 111.png', 'Rau ôm hay còn gọi là Ngò ôm hay ngò om, Các tỉnh miền Nam gọi là rau om hay rau ôm. Tại các tỉnh miền Trung, rau này còn được gọi là ngổ hương. Các tên gọi khác ngổ thơm, ngổ om, mò om hoặc ngổ điếc, ngổ trâu.Thành phần hóa học: Trong rau ngò ôm có 92% nước, 2,1% protid, 1,2% glucid, 2,1% cenluloza, 0,8% tro, 0,29% vitamin B, 2,11% vitamin C, 2,11% caroten, có chứa nhiều tinh dầu (0,1%), chủ yếu là limonene, aldehyd perilla, monoterpenoid cetone, và cis-4-caranone, ngoài ra còn có các nhóm hợp ', 7000, 6500, 25, 0, 6),
(73, 'Sầu riêng Ri6 nguyên trái', 13, '03162023045732362200image 112.png', '03162023045732374300image 113.png', '03162023045732377400image 114.png', 'Sầu riêng là trái cây có mùi nồng đặc trưng nhưng lại được nhiều người rất ưa chuộng. Loại trái cây này chứa nhiều dinh dưỡng tốt cho sức khỏe. Đặc biệt, ăn sầu riêng sẽ mang đến nhiều lợi ích mà nhiều người vẫn chưa biết đến. Hiện nay, sầu riêng đang là trái cây được cung cấp rộng rãi trên thị trường Việt và nhiều quốc gia tại Đông Nam Á.Sầu riêng được mệnh danh là “vua” của các loài trái cây. Nguồn gốc của nó xuất phát từ các quốc gia vùng nhiệt đới ở Đông Nam Á. Loại trái cây này có mùi nồng ', 120000, 110000, 21, 0, 7),
(74, 'Dưa hấu không hạt 1kg', 13, '03162023045839698400image 117.png', '03162023045839702600image 116.png', '03162023045839707100image 115.png', 'Sự xuất hiện của dưa hấu không hạt mang đến những trải nghiệm thú vị hơn với những ai đam mê loại trái cây ăn. Không chỉ hương vị hấp dẫn, thanh mát mà việc ăn dưa hấu cũng không cần phải nhả hạt như trước. Chính ưu điểm này đã khiến nhiều người đổ xô lựa chọn loại dưa này ngày càng nhiều hơn. Đây là giống dưa hấu có vị ngọt thanh, dễ chịu. Ruột dưa màu đỏ tươi và không có hạt hoặc rất ít hạt. Hương thơm của dưa hấu không hạt cũng rất hấp dẫn. Đặc biệt, nó có thể phù hợp với cả người lớn hay trẻ', 30000, 27000, 12, 0, 7),
(75, 'Ổi nữ hoàng giòn 1kg', 13, '03162023045944311900image 119.png', '03162023045944314600image 120.png', '03162023045944319100image 118.png', 'Ổi Nữ Hoàng luôn là lựa chọn của rất nhiều “tín đồ” yêu thích loại trái cây này. Với ưu điểm giòn, ngọt, ít hạt, loại ổi này hiện bán rất “chạy” trên thị trường. Kể từ khi du nhập vào Việt Nam, Nữ Hoàng vẫn luôn là loại ổi được nhiều nhà vườn lựa chọn để trồng và cung cấp ra thị trường.  Sở dĩ giống ổi này được gọi tên là Nữ Hoàng không chỉ bởi hương vị thơm ngon mà còn là nhờ nguồn dinh dưỡng phong phú bên trong. Loại ổi này có rất nhiều vitamin, khoáng chất và nhiều chất xơ. Đặc biệt, hàm lượn', 27000, 27000, 30, 0, 7),
(76, 'Mận an phước bịt 1kg', 13, '03162023050039676600image 122.png', '03162023050039679300image 121.png', '03162023050039683400image 123.png', 'Mận An Phước có phần thịt trắng, giòn và vị ngọt thanh rất dễ chịu. Hơn thế nữa, do không có hạt nên mận luôn khiến người dùng thấy thích thú, tiện lợi hơn khi thưởng thức. Thông thường, mận sẽ có trọng lượng 8 – 10 quả/kg. Nếu là quả to thì từ 4 - 6 quả/kg.Điểm nổi bật của Mận An Phước chính là chứa nhiều chất xơ và không có chất béo. Ngoài ra, các vitamin, khoáng chất và nhiều dưỡng chất thiết yếu khác bên trong mận cũng giúp ích rất lớn với việc chăm sóc sức khỏe người dùng', 40000, 40000, 23, 0, 7);
INSERT INTO `product` (`id_prd`, `name_prd`, `id_cate`, `img_prd_1`, `img_prd_2`, `img_prd_3`, `detail`, `cost`, `price`, `quanlity`, `view`, `id_admin`) VALUES
(77, 'Xoài Đài Loan loại 1', 13, '03162023050159416100image 126.png', '03162023050159420000image 124.png', '03162023050159422600image 125.png', 'Xoài Đài Loan cũng được trồng tại Việt Nam và là loại trái cây ăn sống rất ngon, đủ độ giòn và không quá chua. Xoài Đài Loan được xếp vào dòng xoài ăn sống ngon nhất hiện nay. Một điểm đặc biệt khác với xoài keo, xoài Đài Loan ăn chín cũng rất ngon và ngọt lịm, hương thơm nhẹ. Người ta thường dùng xoài Đài Loan để ăn sống, làm gỏi, xay sinh tố và làm bánh xoài. Với giá thành rất rẻ, có khi còn hạ nhiệt hơn so với xoài keo, vào mùa xoài Đài Loan giá khởi điểm khoảng 9000đồng/kg, một mức giá vô cù', 30000, 25000, 30, 0, 7),
(78, 'vú sữa hoàng kim 500g', 13, '03162023050308996500image 128.png', '03162023050308999300image 127.png', '03162023050309002500image 129.png', 'Vú sữa Hoàng Kim hay còn được gọi với cái tên là vú sữa Abiu, là giống vú sữa vàng xuất xứ từ Đài Loan. Khác với những loại vú sữa thông thường có màu xanh sẫm hoặc xanh tím, thịt quả mỏng, loại quả này có vỏ vàng, thịt dày và rất thơm. Quả có vỏ mỏng, căng bóng và mùi thơm ngon vô cùng đặc trưng.Vú sữa Hoàng Kim có hương vị thơm ngon độc đáo, mang lại nhiều giá trị dinh dưỡng tốt cho sức khỏe.', 120000, 115000, 30, 0, 7),
(79, 'Kiwi vàng nhập khẩu  1kg', 14, '03162023050653028900image 130.png', '03162023050653032500image 131.png', '03162023050653037100image 132.png', 'Kiwi còn là loại trái cây mang lại rất nhiều công dụng có ích cho sức khoẻ, ngoài việc làm đẹp làn da thì kiwi còn góp phần kiểm soát huyết áp, giúp giảm đông máu, và vì có nhiều chất xơ nên quả Kiwi hỗ trợ rất tốt cho hệ tiêu hoá, giúp tăng cường hệ thống miễn dịch, giảm các bệnh cúm và cảm lạnh. Trong quả kiwi còn chưa rất nhiều vitamin C góp phần làm tăng sức đề kháng chống lại được nhiều bệnh tật khác... quả kiwi là loại quả rất tốt cho sức khoẻ của người tiêu dùng, không những thế trái kiwi', 220000, 21000, 21, 0, 7),
(80, 'nho đen không hạt úc', 14, '03162023050750715700image 134.png', '03162023050750719100image 133.png', '03162023050750721700image 135.png', 'Nho đen không hạt Úc thường là những chùm bẹ lớn, các trái nhỏ dài xen vào nhau, thường sẽ có một lớp phấn trắng rất mỏng phủ bên ngoài, các trái tạo nên một chùm rất chắc chắn, trái có màu đen và đặc biệt là không có hạt, vị của nho đen Úc rất đặc trưng đó chính là ngọt thanh và hơi chát nhẹ ở lớp vỏ bên ngoài. Thường chùm nho đen dao động khoảng 0,5kg - 1kg hơn, được đóng gói theo túi có thương hiệu của nước Úc.', 320000, 310000, 12, 0, 7),
(81, 'Lựu peru đỏ mọng 500g', 14, '03162023050851747500image 136.png', '03162023050851750900image 137.png', '03162023050851754600image 138.png', 'Lựu được trồng rất nhiều ở các nơi như Nam Mỹ hay Trung Quốc và ngay tại đất nước Việt Nam chúng ta lựu cũng được trồng nhiều. Thường có các loại lựu đó là Peru, Vân Anh, Tứ Xuyên... trong số này loại mắc tiền xếp vào hàng cao cấp đó là Peru, tiếp theo đó là Tứ Xuyên và cuối cùng là Vân Anh. Đây chính là 3 loại lựu đặc trưng của Citi Fruit.Nói về Peru, loại lựu cao cấp, nhập khẩu từ nước ngoài, giá thành khá đắc đỏ nhưng lại rất được ưa chuộng tại thị trường Việt Nam. Quả có màu đỏ rất đẹp, độ t', 120000, 110000, 30, 0, 7),
(82, 'Cherry nhập khẩu từ Mỹ', 14, '03162023051028891800image 139.png', '03162023051028896100image 140.png', '03162023051028899100image 141.png', 'Trong tất cả các hàng lạnh cao cấp hiện nay, Cherry được xếp vào hàng loại đặc biệt ngon nhất và xuất khẩu  sang thị trường nhiều nước khác nhau. Cherry được trồng nhiều ở Mỹ, Canada, Newzealand, Úc và Chile... và đây cũng là loại quả cung cấp nhiều dưỡng chất tốt cho sức khoẻ mọi nhà. Kết cấu của quả cherry có hình bi, nhỏ và màu tím, cherry xanh cuống rất tươi và trông rất đẹp mắt, Cherry khi nhập khẩu còn mới sẽ có độ ngọt thanh, đậm đà vị và tan giòn, hương thơm nhẹ...', 660000, 649000, 16, 0, 7),
(83, 'Lê Nam Phi nhập khẩu', 14, '03162023051134040100image 142.png', '03162023051134044000image 143.png', '03162023051134046400image 144.png', 'Có nguồn gốc từ các tỉnh phía Tây Nam của Nam Phi, lê Nam Phi có màu sắc đặc biệt là sự xen kẽ của 3 màu: xanh, đỏ, vàng rất đẹp mắt. Sở hữu hình dáng đặc biệt như hình giọt nước, hương vị lại đặc biệt, tuy nhiên công dụng của lê Nam Phi mới thực sự là lý do loại quả này được ưa chuộng trên thị trường Việt Nam. Lê Nam Phi có thể hấp thụ glucose và chuyển hoá thành năng lượng để cơ thể hoạt động khoẻ mạnh. Ăn một quả lê Nam Phi vào lúc cơ thể có dấu hiệu mệt mỏi hay suy nhược sẽ là một lựa chọn t', 120000, 119000, 23, 0, 7),
(84, 'Táo gala Mỹ nhập khẩu', 14, '03162023051225381200image 146.png', '03162023051225384000image 145.png', '03162023051225388600image 147.png', 'Những quả đỏ tròn, được dán tem USA lên từng quả, kích thước 1 quả khoảng 0,15kg - 0,2kg, màu đỏ tươi. Vị của táo Gala Mỹ là vị ngọt thanh, rất giòn và không hề bị xốp bột, hương thơm nhẹ, vì là loại trái cây cao cấp nên táo Gala Mỹ luôn được bảo quản lạnh, đủ nhiệt độ để trái táo được tươi nhất khi vận chuyển xa. Khác với các loại táo khác, Táo Gala Mỹ giá bình ổn hơn táo Envy, nhưng lại cao hơn táo New Zealand hay táo Trung Quốc', 149000, 149000, 12, 0, 7),
(85, 'Mít nghệ tiền giang 1kg', 15, '03162023051838669400Rectangle 20.png', '03162023051838672500Rectangle 21.png', '03162023051838676900image 148.png', 'Tiền Giang được biết đến là vùng đất trồng nhiều hoa quả đặc sản, trong đó không thể không nhắc tới mít nghệ. Mít nghệ Tiền Giang có vị ngọt thanh tự nhiên, mùi thơm đặc trưng, múi mít dày, ít xơ, màu vàng hấp dẫn. Khi gọt bỏ cùi và lõi thì múi mít nghệ sẽ hết mủ, nên khi ăn sẽ không bị dính tay. Mít rất giàu các chất dinh dưỡng quan trọng như vitamin A, vitamin C, canxi, kali, sắt, thiamin, riboflavin, niacin, magneisum và nhiều chất dinh dưỡng khác.', 36000, 34000, 30, 0, 7),
(86, 'Na Dai núi Bà đen', 15, '03162023051950061100image 151.png', '03162023051950065500image 152.png', '03162023051950069300image 153.png', 'Na dai thương hiệu Bà Đen Tây Ninh được trồng hữu cơ theo tiêu chuẩn sạch quốc tế. Mãng cầu ta Tây Ninh nổi tiếng về độ ngon ngọt. Đất Tây Ninh là đất thịt pha sỏi và cát nên cây mãng cầu ở đây phát triển rất tốt và cho chất lượng rất ngon. Đặc biệt vùng quanh núi Bà Đen là mãng cầu ngon nhất.', 220000, 210000, 22, 0, 7),
(87, 'Bơ sáp đăk lăk 1kg', 15, '03162023052043931500image 154.png', '03162023052043935700image 155.png', '03162023052043939900image 156.png', 'Bơ sáp Đăk Lăk được mọi người yêu thích bởi giá trị dinh dưỡng rất cao, hương vị thơm ngon và nhiều tác dụng tích cực tới sức khoẻ con người. Nếu có dịp ghé qua vùng  Đắk Lắk ngay mùa bơ sáp bạn sẽ càng trĩu lòng hơn bởi hình ảnh những quả bơ sáp trĩu cả ngọn đồi bazan. Bơ là một loại quả vừa ngon vừa bổ dưỡng', 35000, 32000, 23, 0, 7),
(88, 'Dừa sáp Trà Vinh  1kg', 15, '03162023052138314000image 158.png', '03162023052138317800image 159.png', '03162023052138320300image 157.png', 'Dừa Sáp đặc sản vùng đất Cầu Kè – Trà Vinh , dừa dày cơm sáp đặc nước dừa sệt kẹo … Nạo cơm dừa sáp cùng với nước dừa sáp , cho thêm tí đuờng , sữa đặc thêm tí đậu phộng rang ăn cùng nước đá xay nhuyễn hoặc bỏ tủ lạnh ăn dần …Dừa sáp được ưa chuộng không chỉ vì vị ngon của chúng mà là còn vì hàm lượng dưỡng chất có trong nó rất cao. Giúp bổ xung các chất quan trọng và cần thiết cho cơ thể, tăng cường sức khỏe cho người sử dụng.', 95000, 95000, 30, 0, 7),
(89, 'Măng cụt lái thiêu 1kg', 15, '03162023052239113100image 160.png', '03162023052239117600image 161.png', '03162023052239120700image 162.png', 'Măng Cụt Lái Thiêu là một trong những món đặc sản Bình Dương mà ai cũng muốn được thử một lần trong đời. Với hương vị ngọt ngào như chính lòng hiếu khách của người Bình Dương – măng cụt Lái Thiêu sẽ khiến du khách nhớ mãi không quên về mảnh đất hữu tình này. Măng cụt là trái cây bổ dưỡng cần thiết cho những ngày hè, loại trái cây này cũng là nguyên liệu chế biến món ăn ngon bổ dưỡng.', 63000, 53000, 12, 0, 7),
(90, 'Dâu tây đà lạt 1kg', 15, '03162023052347218800image 163.png', '03162023052347222100image 164.png', '03162023052347225200image 165.png', 'Dâu tây là một nguồn cung cấp chất chống oxy hóa và chất dinh dưỡng có tác dụng bảo vệ sức khỏe mạnh mẽ. Chúng có hàm lượng calo thấp, giàu chất xơ và dồi dào chất chống oxy hóa và polyphenol.Một cốc dâu tây chứa hơn 100% mục tiêu tối thiểu hàng ngày đối với vitamin C hỗ trợ miễn dịch. Ngoài chức năng như một chất chống oxy hóa phòng chống lại bệnh tật và tuổi tác, vitamin C còn giúp tạo ra collagen và duy trì sức khỏe của da.', 280000, 263000, 30, 0, 7),
(91, 'Bưởi 5roi Việt Nam', 16, '03162023053803988500Rectangle 2.png', '03162023053803991200Rectangle 3.png', '03162023053803993700Rectangle 1.png', 'Bưởi là một loại trái cây bổ dưỡng và bạn có thể để thêm nó vào chế độ ăn uống hằng ngày. Quả bưởi không chỉ “nổi tiếng” vì cung cấp hàm lượng dinh dưỡng cao mà còn chứa rất ít calo. Trên thực tế, bưởi chính là một trong những trái cây chứa hàm lượng calo thấp nhất. Quả bưởi cung cấp một lượng chất xơ cao, cùng hơn 15 loại vitamin và khoáng chất tốt cho sức khỏe. Ăn bưởi thường xuyên giúp bạn tăng cường hệ miễn dịch. Nó được đánh giá cao vì giàu hàm lượng vitamin C cùng tính chất chống oxy hóa, ', 35000, 35000, 30, 0, 8),
(92, 'Sầu riêng Ri 6', 16, '03162023053902421200Rectangle 4.png', '03162023053902423700Rectangle 5.png', '03162023053902426700Rectangle 6.png', 'Giống sầu riêng Ri 6 là giống sầu riêng có nguồn gốc từ Myanmar và gắn liền với tên tuổi ông Sáu Ri (tên thật là Nguyễn Minh Châu) sống tại xã Bình Hòa, huyện Long Hồ, tỉnh Vĩnh Long. Năm 1990, gia đình ông đã mua 6 cây giống của người họ hàng mang về từ Myanmar với giá 30 giạ lúa. Năm 1999, ông mang giống sầu riêng này đến hội thi hội thi Trái Cây Ngon Đồng Bằng Sông Cửu Long và đoạt giải nhất. Từ đó giống sầu riêng này được nhiều người biết đến và được trồng phổ biến tại nhiều địa phương và đư', 160000, 160000, 13, 0, 8),
(93, 'Nhãn tiêu da bò', 16, '03162023053953055400Rectangle 8.png', '03162023053953059000Rectangle 9.png', '03162023053953062700Rectangle 7.png', 'Loại nhãn này có rất nhiều tại miền Tây và rất được ưa chuộng. Bởi loại nhãn có cơm rất dày, hạt nhỏ như hạt tiêu kèm thêm vỏ nhãn có màu vàng như da bò nên dân gian đặt tên là nhãn tiêu da bò. Khi thưởng thức bạn sẽ cảm nhận được hương thơm mát cùng vị ngọt thanh lưu lại trên đầu lưỡi và dưới cuống họng. Những cây nhãn càng nhiều tuổi thì phần thịt cơm bên trong lại càng dày và quả sẽ càng ngọt và thơm hơn.', 60000, 60000, 23, 0, 8),
(94, 'Na Kiên Giang', 16, '03162023054045565200Rectangle 10.png', '03162023054045568500Rectangle 11.png', '03162023054045570900Rectangle 12.png', 'Na được xem là nguồn cung cấp vitamin C, A dồi dào có khả năng cải thiện thị lực. Bên cạnh đó, nó còn chứa riboflavin, vitamin B2 khi đi vào cơ thể có tác dụng chống lại sự hình thành các gốc tự do, khiến mọi người có được đôi mắt sáng, tinh anh. Na chứa lượng lớn magie, kali và các khoáng chất có lợi. Khi đi vào cơ thể, những dưỡng chất này có khả năng bảo vệ tim mạch, thư giãn cơ bắp và kiểm soát huyết áp, giúp mọi người có được một trái tim khỏe mạnh.', 16000, 16000, 23, 0, 8),
(95, 'Cam sành đồng tháp', 16, '03162023054149542200Rectangle 13.png', '03162023054149545600Rectangle 14.png', '03162023054149549400Rectangle 15.png', 'Cam sành là loại trái cây vốn được nhiều người yêu thích, đặc biệt là trẻ nhỏ và chị em phụ nữ, bởi cam rất bổ dưỡng và cao cấp. Trái cam sành có đặc điểm mang màu xanh sậm đến khi chín thì ngả màu vàng, dáng tròn dẹt, hương vị chua ngọt, thị trái nhiều nước. Một đặc điểm nữa đó là cam sành có khá nhiều hạt nên thường được dùng phổ biến để vắt cam. Vỏ ngoài cam sần sùi, dày 3-5mm, trọng lượng trung bình mỗi trái khoảng 275gram. Chu kỳ khai thác là 10-15 năm. Giống cây này được trồng nhiều nhất t', 30000, 30000, 23, 0, 8),
(96, 'Vải thiều Kiên Giang', 16, '03162023054246549200Rectangle 18.png', '03162023054246553500Rectangle 19.png', '03162023054246556300Rectangle 17.png', 'Chiết xuất vải thiều có khả năng chống ung thư. Nó có thể có khả năng ngăn chặn sự phát triển tế bào của các bệnh ung thư khác nhau. Nhưng để kiểm chứng công dụng này vẫn cần nhiều nghiên cứu hơn nữa. Bạn nên ăn ít nhất 1,5 đến 2,5 cốc trái cây mỗi ngày và 2 đến 4 cốc rau. Ăn nhiều trái cây và rau quả có thể giúp giảm nguy cơ phát triển các bệnh như bệnh tim mạch, đột quỵ và một số loại ung thư.‌ Chất chống oxy hóa trong quả vải giúp cải thiện hệ miễn dịch, làm chậm sự tiến triển của bệnh đục th', 45000, 45000, 23, 0, 8),
(97, 'Cà chua beefsteak', 17, '03162023054414577900Rectangle 3.png', '03162023054414581600Rectangle 1.png', '03162023054414584200Rectangle 2.png', 'Cà chua beefsteak là giống cà chua cao cấp của châu Âu có nhiều ưu điểm như trái to, chắc, ít hạt, cơm dày. Đường kính trái khi bổ ra có thể đủ khoanh tròn đáy đĩa thức ăn. Cà chua Beef chín cây có trái lớn, màu đỏ sậm, nhiều thịt và có hương vị đặc trưng thơm ngon. Hầu hết các loại cà chua đều có đường kính trung bình từ 5 - 6cm và có thể sinh trưởng trong những điều kiện phát triển khác nhau. Cà chua là một trong những loại rau quả có giá trị dinh dưỡng cao, nhất là vitamin A, vitamin C và vit', 30000, 30000, 30, 0, 8),
(98, 'Cà chua Roma túi 1kg', 17, '03162023054511093100Rectangle 5.png', '03162023054511097700Rectangle 4.png', '03162023054511102000Rectangle 6.png', 'Tại cửa hàng Với sản phẩm tươi sống trọng lượng thực tế có thể chênh lệch khoảng 10Hình ảnh sản phẩm tươi. Sống trọng lượng thực tế tại cửa hàng Với sản phẩm có thể chênh lệch khoảng 102613716 Với sản phẩm có thể. Chênh lệch khoảng 10Hạt dỗi Xuất xứ Việt Nam Trọng lượng 300 gr Dùng để trông Với sản phẩm tươi sống trọng. Lượng thực tế có thể chênh lệch khoảng 108938521576006 Với sản phẩm có thể chênh lệch khoảng 108936123160173 Với sản. Phẩm tươi sống trọng lượng thực tế tại cửa hagraveng Với sản', 42000, 42000, 30, 0, 8),
(99, 'Cà chua Bi', 17, '03162023054611974800Rectangle 7.png', '03162023054611978600Rectangle 8.png', '03162023054611981100Rectangle 9.png', 'Tại cửa hàng Với sản phẩm tươi sống trọng lượng thực tế có thể chênh lệch khoảng 10Hình ảnh sản phẩm tươi. Sống trọng lượng thực tế tại cửa hàng Với sản phẩm có thể chênh lệch khoảng 102613716 Với sản phẩm có thể. Chênh lệch khoảng 10Hạt dỗi Xuất xứ Việt Nam Trọng lượng 300 gr Dùng để trông Với sản phẩm tươi sống trọng. Lượng thực tế có thể chênh lệch khoảng 108938521576006 Với sản phẩm có thể chênh lệch khoảng 108936123160173 Với sản. Phẩm tươi sống trọng lượng thực tế tại cửa hagraveng Với sản', 42000, 42000, 30, 0, 8),
(100, 'Cà chua anh đào đen', 17, '03162023054717777300Rectangle 13.png', '03162023054717780300Rectangle 14.png', '03162023054717782900Rectangle 15.png', 'Cà chua đen có thêm anthocyanin thì được tăng cường thêm một chút khả năng chống oxy hóa. Dù vậy theo phân tích của các nhà nghiên cứu trên thế giới, hàm lượng anthocyanin trong cà chua đen thấp hơn nhiều so với quả dâu tằm hoặc việt quất (blueberry). Quả dâu tằm và việt quất chứa 1-3 mg trên một g quả tươi trong khi cà chua đen chỉ chứa 0,1-0,3 mg. Hơn nữa hàm lượng anthocyanin phụ thuộc rất nhiều vào chế độ canh tác và điều kiện đất trồng.', 42000, 42000, 12, 0, 8),
(101, 'Cà chua Sungold', 17, '03162023054823977500Rectangle 18.png', '03162023054823980600Rectangle 19.png', '03162023054823983400Rectangle 17.png', 'Cà chua rất giàu vitamin A, C, K, vitamin B6, kali, folate, thiamin, magiê, niacin, đồng và phốt pho, là những vi chấtcần thiết để duy trì một sức khỏe tốt. Điều tuyệt vời hơn ở cà chua là chúng chứa rất ít cholesterol, chất béo bão hòa, natri và calo. Bạn có thể ăn cà chua sống kẹp với bánh mì, làm salad, nước sốt, sinh tố, thậm chí nấu súp. Sau đây là 9 lợi ích của cà chua.', 42000, 42000, 30, 0, 8),
(102, 'Cà chua tím Cherokee', 17, '03162023054914008800Rectangle 15.png', '03162023054914012400Rectangle 13.png', '03162023054914015400Rectangle 14.png', 'Cà chua rất giàu vitamin A, C, K, vitamin B6, kali, folate, thiamin, magiê, niacin, đồng và phốt pho, là những vi chấtcần thiết để duy trì một sức khỏe tốt. Điều tuyệt vời hơn ở cà chua là chúng chứa rất ít cholesterol, chất béo bão hòa, natri và calo. Bạn có thể ăn cà chua sống kẹp với bánh mì, làm salad, nước sốt, sinh tố, thậm chí nấu súp. Sau đây là 9 lợi ích của cà chua.', 42000, 42000, 30, 0, 8),
(103, 'Mít nghệ tiền giang 1kg', 18, '03162023055111077100Rectangle 20.png', '03162023055111080000Rectangle 21.png', '03162023055111084100Rectangle 22.png', 'Tiền Giang được biết đến là vùng đất trồng nhiều hoa quả đặc sản, trong đó không thể không nhắc tới mít nghệ. Mít nghệ Tiền Giang có vị ngọt thanh tự nhiên, mùi thơm đặc trưng, múi mít dày, ít xơ, màu vàng hấp dẫn. Khi gọt bỏ cùi và lõi thì múi mít nghệ sẽ hết mủ, nên khi ăn sẽ không bị dính tay. Mít rất giàu các chất dinh dưỡng quan trọng như vitamin A, vitamin C, canxi, kali, sắt, thiamin, riboflavin, niacin, magneisum và nhiều chất dinh dưỡng khác.', 36000, 36000, 24, 0, 8),
(104, 'Na Dai núi Bà đen', 18, '03162023055217122700Rectangle 3.png', '03162023055217125800Rectangle 2.png', '03162023055217129200Rectangle 1.png', 'Na dai thương hiệu Bà Đen Tây Ninh được trồng hữu cơ theo tiêu chuẩn sạch quốc tế. Mãng cầu ta Tây Ninh nổi tiếng về độ ngon ngọt. Đất Tây Ninh là đất thịt pha sỏi và cát nên cây mãng cầu ở đây phát triển rất tốt và cho chất lượng rất ngon. Đặc biệt vùng quanh núi Bà Đen là mãng cầu ngon nhất', 100000, 10000, 24, 0, 8),
(105, 'Bơ sáp đăk lăk 1kg', 18, '03162023055402391500Rectangle 4.png', '03162023055402395100Rectangle 5.png', '03162023055402398000Rectangle 6.png', 'Bơ sáp Đăk Lăk được mọi người yêu thích bởi giá trị dinh dưỡng rất cao, hương vị thơm ngon và nhiều tác dụng tích cực tới sức khoẻ con người. Nếu có dịp ghé qua vùng  Đắk Lắk ngay mùa bơ sáp bạn sẽ càng trĩu lòng hơn bởi hình ảnh những quả bơ sáp trĩu cả ngọn đồi bazan. Bơ là một loại quả vừa ngon vừa bổ dưỡng', 56000, 56000, 30, 0, 8),
(106, 'Dừa sáp Trà Vinh  1kg', 18, '03162023055510137600Rectangle 7.png', '03162023055510142500Rectangle 8.png', '03162023055510146300Rectangle 9.png', 'Dừa Sáp đặc sản vùng đất Cầu Kè – Trà Vinh , dừa dày cơm sáp đặc nước dừa sệt kẹo … Nạo cơm dừa sáp cùng với nước dừa sáp , cho thêm tí đuờng , sữa đặc thêm tí đậu phộng rang ăn cùng nước đá xay nhuyễn hoặc bỏ tủ lạnh ăn dần …Dừa sáp được ưa chuộng không chỉ vì vị ngon của chúng mà là còn vì hàm lượng dưỡng chất có trong nó rất cao. Giúp bổ xung các chất quan trọng và cần thiết cho cơ thể, tăng cường sức khỏe cho người sử dụng.', 95000, 95000, 22, 0, 8),
(107, 'Măng cụt lái thiêu1kg', 18, '03162023055619912700Rectangle 10.png', '03162023055619916300Rectangle 11.png', '03162023055619920500Rectangle 12.png', 'Măng Cụt Lái Thiêu là một trong những món đặc sản Bình Dương mà ai cũng muốn được thử một lần trong đời. Với hương vị ngọt ngào như chính lòng hiếu khách của người Bình Dương – măng cụt Lái Thiêu sẽ khiến du khách nhớ mãi không quên về mảnh đất hữu tình này. Măng cụt là trái cây bổ dưỡng cần thiết cho những ngày hè, loại trái cây này cũng là nguyên liệu chế biến món ăn ngon bổ dưỡng.', 63000, 53000, 11, 0, 8),
(108, 'Dâu tây đà lạt  1kg', 18, '03162023055724338300Rectangle 13.png', '03162023055724342400Rectangle 14.png', '03162023055724345200Rectangle 15.png', 'Dâu tây là một nguồn cung cấp chất chống oxy hóa và chất dinh dưỡng có tác dụng bảo vệ sức khỏe mạnh mẽ. Chúng có hàm lượng calo thấp, giàu chất xơ và dồi dào chất chống oxy hóa và polyphenol.Một cốc dâu tây chứa hơn 100% mục tiêu tối thiểu hàng ngày đối với vitamin C hỗ trợ miễn dịch. Ngoài chức năng như một chất chống oxy hóa phòng chống lại bệnh tật và tuổi tác, vitamin C còn giúp tạo ra collagen và duy trì sức khỏe của da.', 100000, 100000, 22, 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rep_comment`
--

CREATE TABLE `rep_comment` (
  `id_rep_cmt` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_cmt` int(11) NOT NULL,
  `rep_cmt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `time_rep_cmt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'subadmin'),
(3, 'brand');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`),
  ADD KEY `id_admin_addcate` (`id_admin`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_prd_cmt` (`id_prd`);

--
-- Chỉ mục cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id_detail_bill`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_prd` (`id_prd`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prd`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_brand` (`id_admin`);

--
-- Chỉ mục cho bảng `rep_comment`
--
ALTER TABLE `rep_comment`
  ADD PRIMARY KEY (`id_rep_cmt`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_cmt` (`id_cmt`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id_detail_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_prd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `rep_comment`
--
ALTER TABLE `rep_comment`
  MODIFY `id_rep_cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `id_admin_addcate` FOREIGN KEY (`id_admin`) REFERENCES `administrator` (`id_admin`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `id_prd_cmt` FOREIGN KEY (`id_prd`) REFERENCES `product` (`id_prd`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `id_prd` FOREIGN KEY (`id_prd`) REFERENCES `product` (`id_prd`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_brand` FOREIGN KEY (`id_admin`) REFERENCES `administrator` (`id_admin`),
  ADD CONSTRAINT `id_cate` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`);

--
-- Các ràng buộc cho bảng `rep_comment`
--
ALTER TABLE `rep_comment`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `administrator` (`id_admin`),
  ADD CONSTRAINT `id_cmt` FOREIGN KEY (`id_cmt`) REFERENCES `comment` (`id_cmt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
