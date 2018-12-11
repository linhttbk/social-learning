FROM centos:latest
RUN yum update -y
RUN yum install httpd httpd-tools -y
RUN yum -y install httpd; yum clean all; systemctl enable httpd.service
RUN yum install -y epel-release
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum repolist
RUN yum install -y php71w php71w-common php71w-gd php71w-phar php71w-xml php71w-cli php71w-mbstring php71w-tokenizer php71w-openssl php71w-pdo php71w-mysql
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
COPY httpd.conf /etc/httpd/conf/httpd.conf
COPY . /var/www/html/project
RUN chown -R apache:apache /var/www/html/project
RUN chmod -R 777 /var/www/html/project/storage
#RUN setsebool -P httpd_enable_homedirs true
#RUN chcon -R -t httpd_sys_content_t /var/www/html/
#RUN firewall-cmd --zone=public --add-port=80/tcp 
#RUN firewall-cmd --zone=public --add-port=443/tcp 
#RUN semanage fcontext -a -t httpd_sys_rw_content_t /var/www/html/course/storage/logs
#RUN restorecon /var/www/html/course/storage/logs

WORKDIR /var/www/html

EXPOSE 83

CMD     ["/usr/sbin/httpd","-D","FOREGROUND"]
