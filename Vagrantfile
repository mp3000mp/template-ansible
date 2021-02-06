# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
#  config.vm.box = "debian/buster64"
  config.vm.box = "ubuntu/bionic64"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder "./docker/volumes", "/home/vagrant/volumes"
  config.vm.synced_folder "./ansible", "/home/vagrant/ansible"
  config.vm.synced_folder "./docker", "/home/vagrant/docker"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  config.vm.provider "virtualbox" do |vb|
    vb.name = "vm_master"
    vb.memory = "2048"
	vb.cpus = "2"
  end

  #
  # View the documentation for the provider you are using for more
  # information on available options.

  # Enable provisioning with a shell script. Additional provisioners such as
  # Ansible, Chef, Docker, Puppet and Salt are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "shell", inline: <<-SHELL
	sudo echo "alias cdw='cd /var/www'" >> /home/vagrant/.profile
	sudo echo "alias cda='cd /etc/apache2/sites-available'" >> /home/vagrant/.profile
	sudo echo "alias ll='ls -la'" >> /home/vagrant/.profile
	sudo echo "alias cc='php bin/console cache:clear'" >> /home/vagrant/.profile

    sudo echo "alias cdw='cd /var/www'" >> /root/.profile
    sudo echo "alias cda='cd /etc/apache2/sites-available'" >> /root/.profile
    sudo echo "alias ll='ls -la'" >> /root/.profile
    sudo echo "alias cc='php bin/console cache:clear'" >> /root/.profile

    sudo echo "tmux" >> /home/vagrant/.profile

  SHELL


  # provisionner = Vagrant::Util::Platform.windows? ? :ansible_local : :ansible
  config.vm.provision "ansible_local" do |ansible|
    ansible.playbook = "./ansible/install.yml"
	ansible.install_mode = ":pip"
    ansible.version = "latest"
	ansible.limit = "all"
	ansible.inventory_path = "./ansible/hosts"
  end

end
