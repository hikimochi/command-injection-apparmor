Vagrant.configure("2") do |config|
  config.vm.box = "bento/ubuntu-20.04"
  config.vm.synced_folder ".", "/app", type: "virtualbox"
  config.vm.network "forwarded_port", guest: 80, host: 8000
  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get upgrade
    apt-get install -y apparmor-utils apparmor-profiles apparmor-profiles-extra
    apt-get install -y php libapache2-mod-php apache2
    ln -s /app/sample-php /var/www/html
  SHELL
end