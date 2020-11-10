# start

```bash
$ vagrant up
$ vagrant ssh
```

# Reference

https://nekotosec.com/verification-oscommand-injection-1/

# 検証手順

1. コマンドの作成

catをコピーしたmycatで検証する

```
sudo cp /usr/bin/cat /usr/bin/mycat
```

2. apparmor設定ファイルの作成

```
sudo aa-genprof /usr/bin/mycat
```

3. 有効化

```
sudo aa-enforce /etc/apparmor.d/usr.bin.mycat
```

4. 確認

catで開けて、mycatで開けないことを確認する。

http://localhost:8000/sample-php/index.html

「google.com; cat /etc/passwd」 # 開ける
「google.com; mycat /etc/passwd」# 何も表示されない（実際はエラー出力だが、phpのshell_execは標準出力しか表示されないため）

5. mycatでも開くことができるファイルの設定

`/etc/apparmor.d/usr.bin.mycat`を編集

「/app/canread.txt r,」を追記

```
/usr/bin/mycat {
  #include <abstractions/base>

  /usr/bin/mycat mr,
  /etc/passwd r,

}
```

6. 再度確認

http://localhost:8000/sample-php/index.html

「google.com; mycat /etc/passwd」 # 開ける