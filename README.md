お問い合わせフォーム
環境構築
Docker ビルド
1.git clone リンク：https://github.com/aki-369/confirmation-test.git
2.docker-compose up -d --build

※MySQl は。OS によって起動しない場合があるのでそれぞれの PC に合わせて。docker-compose.yml ファイルを編集してください。

Laravel 環境構築
1.docker-compose exec php bash
2.composer install
3..env.example ファイルから.env を作成し、環境変数を構築
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・PHP 8.3
・Laravel 11
・MySQL 8.0

URL
・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/

![confirmation-test drawio](https://github.com/aki-369/confirmation-test/assets/161927378/f63a619c-059c-4320-a118-4e612ea9ba59)
