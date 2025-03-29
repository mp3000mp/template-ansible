# template-ansible

[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)

## Requirements

 * Debian >=12
 * Ansible >=2.14
 * ssh key authorized user

### Setup server

Will install
 * docker
 * apache
 * certbot

Will configure
 * aliases
 
```
ansible-playbook -i inventory/hosts server_setup.yml
```

### todo

 * fail2ban
 * ufw
 * logrotate
