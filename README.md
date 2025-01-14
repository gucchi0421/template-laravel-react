セットアップ
```sh
cp env.example .env
task dev
task run:migrate
task run:seed
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan config:clear
```
もし[localhost](http://localhost)でUbuntuのデフォルトページが表示されたらローカルのApacheを停止する。
```sh
sudo systemctl stop apache2
sudo systemctl disable apache2
```
```
