<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->delete();
        DB::table('authors')->insert([
            ['name'=>'Nhĩ Căn','slug'=>'nhi-can'],
            ['name'=>'Tinh Hà Dĩ Thậm','slug'=>'tinh-ha-di-tham'],
            ['name'=>'Mặc Mặc','slug'=>'mac-mac'],
            ['name'=>'Trường Đình Không Tỉnh','slug'=>'truong-dinh khong-tinh'],
            ['name'=>'Thần Đông','slug'=>'than-dong'],
            ['name'=>'Vô Tội','slug'=>'vo-toi'],
            ['name'=>'Mộ Vũ Thần Thiên','slug'=>'mo-vu-than-thien'],
            ['name'=>'Phiêu Linh Huyễn','slug'=>'phieu-linh-huyen'],
            ['name'=>'Dĩ Cầm','slug'=>'di-cam'],
            ['name'=>'Băng Nhi','slug'=>'bang-nhi'],
            ['name'=>'Minh Hoàng','slug'=>'minh-hoang'],
            ['name'=>'Nguyễn Hồng Dung','slug'=>'nguyen-hong-dung'],
            ['name'=>'Phương Trà','slug'=>'phuong-tra'],
            ['name'=>'Lê Tuấn Vũ','slug'=>'le-tuan-vu'],
            ['name'=>'Mặc Gia','slug'=>'mac-gia'],
            ['name'=>'Huỳnh Thiên Hương','slug'=>'huynh-thien-huoung'],
            ['name'=>'Việt Nga','slug'=>'viet-nga'],
            ['name'=>'Song Quỳnh','slug'=>'song-quynh'],
            ['name'=>'Đặng Thùy Dương','slug'=>'dang-thuy-duong'],
            ['name'=>'Ninh Ka','slug'=>'ninh-ka'],
            ['name'=>'Quang Triệu','slug'=>'quang-trieu'],
            ['name'=>'Khả Hân','slug'=>'kha-han'],
            ['name'=>'Trần Linh','slug'=>'tran-linh'],
            ['name'=>'Quang Triệu','slug'=>'quang-trieu'],
            ['name'=>'Danh Giác','slug'=>'danh-giac'],
            ['name'=>'Vô Thần','slug'=>'vo-than'],
            ['name'=>'Đoá Hoa Vô Thường','slug'=>'doa-hoa-vo-thuong'],
            ['name'=>'Lâm Gia - Thái Bảo','slug'=>'lam-gia-thai-bao'],
            ['name'=>'Trần Thu Huyền','slug'=>'tran-thu-huyen'],
            ['name'=>'Phật Tiền Hiến Hoa','slug'=>'phat-tien-hien-hoa'],
            ['name'=>'Thụy Du','slug'=>'thuy-du'],
            ['name'=>'Ngã Hội Tu Không Điều','slug'=>'nga-hoi-tu-khong-dieu'],
            ['name'=>'Môn Trung Mã','slug'=>'mon-trung-ma'],
            ['name'=>'Kinh Hỷ','slug'=>'kinh-hy'],
            ['name'=>'Vu Cửu','slug'=>'vu-cuu'],
            ['name'=>'Uyển Nhi','slug'=>'uyen-nhi'],
            ['name'=>'Trung Kiên','slug'=>'trung-kien'],
            ['name'=>'Minh Nguyệt Vô Ưu','slug'=>'minh-nguyet-vo-uu'],
            ['name'=>'Hoàng Kiên','slug'=>'hoang-kien'],
            ['name'=>'Mạnh Ninh - Nhật Hạ','slug'=>'manh-ninh-nhat-ha'],
            ['name'=>'Phan Thanh An','slug'=>'phan-thanh-an'],
            ['name'=>'Lương Duy','slug'=>'luong-duy'],
            ['name'=>'Gấu Nhồi Bông','slug'=>'gau-nhoi-bong'],
            ['name'=>'Nhà Văn Bố Láo','slug'=>'nha-van-bo-lao'],
            ['name'=>'Triết Sâm','slug'=>'triet-sam'],
            ['name'=>'Xuân Xanh','slug'=>'xuan-xanh'],
            ['name'=>'Phi Long','slug'=>'phi-long'],
            ['name'=>'Lâm Phong','slug'=>'lam-phong'],
            ['name'=>'Hà Cơ','slug'=>'ha-co'],
            ['name'=>'Nam King','slug'=>'nam-king'],
            ['name'=>'Nguyễn Tuấn Anh','slug'=>'nguyen-tuan-anh'],
            ['name'=>'Huỳnh Duy','slug'=>'huynh-duy'],
            ['name'=>'Tường Vân','slug'=>'tuong-van'],
            ['name'=>'Đức Minh','slug'=>'duc-minh'],
            ['name'=>'Hoàng Nam','slug'=>'hoang-nam'],
            ['name'=>'Thảo Trang','slug'=>'thao-trang'],
            ['name'=>'Diễm Hằng','slug'=>'diem-hang'],
            ['name'=>'Chiến Nguyễn','slug'=>'chien-nguyen'],
            ['name'=>'Đào Phú Hải','slug'=>'dao-phu-hai'],
            ['name'=>'Đại Thất Tử','slug'=>'dai-that-tu'],
            ['name'=>'Minh Nguyệt Vô Ưu','slug'=>'minh-nguyet-vo-uu'],
        ]);
    }
}
