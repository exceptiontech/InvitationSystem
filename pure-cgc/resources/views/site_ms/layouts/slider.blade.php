


<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
@if (count($slider))
    @foreach ($slider as $slider_one)
        <div class="slider-item" style="background-image: url({{ img_chk_exist($slider_one->img) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-sm-12 ftco-animate text-center">
                    <h1 class="mb-2">{{ $slider_one->name }}</h1>
                    <h2 class="subheading mb-4">{{ $slider_one->details }}</h2>
                    <p><a href="#" class="btn btn-primary">View Details</a></p>
                </div>

                </div>
            </div>
        </div>
    @endforeach
@endif
  </div>
</section>

{{--
<VirtualHost 141.136.44.162:80>
    SuexecUserGroup "#1017" "#1015"
    ServerName masool.net
    ServerAlias www.masool.net
    ServerAlias mail.masool.net
    ServerAlias webmail.masool.net
    ServerAlias admin.masool.net
    DocumentRoot /home/masool/public_html
    ErrorLog /var/log/virtualmin/masool.net_error_log
    CustomLog /var/log/virtualmin/masool.net_access_log combined
    ScriptAlias /cgi-bin/ /home/masool/cgi-bin/
    ScriptAlias /awstats/ /home/masool/cgi-bin/
    DirectoryIndex index.html index.htm index.php index.php4 index.php5
    <Directory /home/masool/public_html>
    Options -Indexes +IncludesNOEXEC +SymLinksIfOwnerMatch +ExecCGI
    allow from all
    AllowOverride All Options=ExecCGI,Includes,IncludesNOEXEC,Indexes,MultiViews,SymLinksIfOwnerMatch
    Require all granted
    AddType application/x-httpd-php .php
    AddHandler fcgid-script .php
    AddHandler fcgid-script .php5.6
    AddHandler fcgid-script .php7.2
    AddHandler fcgid-script .php7.4
    FCGIWrapper /home/masool/fcgi-bin/php7.4.fcgi .php
    FCGIWrapper /home/masool/fcgi-bin/php5.6.fcgi .php5.6
    FCGIWrapper /home/masool/fcgi-bin/php7.2.fcgi .php7.2
    FCGIWrapper /home/masool/fcgi-bin/php7.4.fcgi .php7.4
    </Directory>
    <Directory /home/masool/cgi-bin>
    allow from all
    AllowOverride All Options=ExecCGI,Includes,IncludesNOEXEC,Indexes,MultiViews,SymLinksIfOwnerMatch
    Require all granted
    </Directory>
    RewriteEngine on
    RewriteCond %{HTTP_HOST} =webmail.masool.net
    RewriteRule ^(?!/.well-known)(.*) https://masool.net:20000/ [R]
    RewriteCond %{HTTP_HOST} =admin.masool.net
    RewriteRule ^(?!/.well-known)(.*) https://masool.net:10000/ [R]
    RemoveHandler .php
    RemoveHandler .php5.6
    RemoveHandler .php7.2
    RemoveHandler .php7.4
    php_admin_value engine Off
    FcgidMaxRequestLen 1073741824
<Files awstats.pl>
AuthName "masool.net statistics"
AuthType Basic
AuthUserFile /home/masool/.awstats-htpasswd
require valid-user
</Files>
Alias /dav /home/masool/public_html
<Location /dav>
    DAV on
    AuthType Basic
    AuthName "masool.net"
    AuthUserFile /home/masool/etc/dav.digest.passwd
    Require valid-user
    ForceType text/plain
    Satisfy All
    RemoveHandler .php
    RemoveHandler .php5.6
    RemoveHandler .php7.2
    RemoveHandler .php7.4
    RewriteEngine off
</Location>
</VirtualHost>

<VirtualHost 141.136.44.162:80>
    SuexecUserGroup "#1001" "#1001"
    ServerName inventory-sys.cf
    ServerAlias www.inventory-sys.cf
    ServerAlias mail.inventory-sys.cf
    ServerAlias webmail.inventory-sys.cf
    ServerAlias admin.inventory-sys.cf
    DocumentRoot /home/inventory-sys/public_html
    ErrorLog /var/log/virtualmin/inventory-sys.cf_error_log
    CustomLog /var/log/virtualmin/inventory-sys.cf_access_log combined
    ScriptAlias /cgi-bin/ /home/inventory-sys/cgi-bin/
    ScriptAlias /awstats/ /home/inventory-sys/cgi-bin/
    DirectoryIndex index.html index.htm index.php index.php4 index.php5
    <Directory /home/inventory-sys/public_html>
    Options -Indexes +IncludesNOEXEC +SymLinksIfOwnerMatch +ExecCGI
    allow from all
    AllowOverride All Options=ExecCGI,Includes,IncludesNOEXEC,Indexes,MultiViews,SymLinksIfOwnerMatch
    Require all granted
    AddType application/x-httpd-php .php
    AddHandler fcgid-script .php
    AddHandler fcgid-script .php5.6
    AddHandler fcgid-script .php7.2
    AddHandler fcgid-script .php7.4
    FCGIWrapper /home/inventory-sys/fcgi-bin/php7.4.fcgi .php
    FCGIWrapper /home/inventory-sys/fcgi-bin/php5.6.fcgi .php5.6
    FCGIWrapper /home/inventory-sys/fcgi-bin/php7.2.fcgi .php7.2
    FCGIWrapper /home/inventory-sys/fcgi-bin/php7.4.fcgi .php7.4
    </Directory>
    <Directory /home/inventory-sys/cgi-bin>
    allow from all
    AllowOverride All Options=ExecCGI,Includes,IncludesNOEXEC,Indexes,MultiViews,SymLinksIfOwnerMatch
    Require all granted
    </Directory>
    RewriteEngine on
    RewriteCond %{HTTP_HOST} =webmail.inventory-sys.cf
    RewriteRule ^(.*) https://inventory-sys.cf:20000/ [R]
    RewriteCond %{HTTP_HOST} =admin.inventory-sys.cf
    RewriteRule ^(.*) https://inventory-sys.cf:10000/ [R]
    RemoveHandler .php
    RemoveHandler .php5.6
    RemoveHandler .php7.2
    RemoveHandler .php7.4
    php_admin_value engine Off
    FcgidMaxRequestLen 1073741824
    <Files awstats.pl>
    AuthName "inventory-sys.cf statistics"
    AuthType Basic
    AuthUserFile /home/inventory-sys/.awstats-htpasswd
    require valid-user
    </Files>
    Alias /dav /home/inventory-sys/public_html
    <Location /dav>
    DAV on
    AuthType Basic
    AuthName "inventory-sys.cf"
    AuthUserFile /home/inventory-sys/etc/dav.digest.passwd
    Require valid-user
    ForceType text/plain
    Satisfy All
    RemoveHandler .php
    RemoveHandler .php5.6
    RemoveHandler .php7.2
    RemoveHandler .php7.3
    RewriteEngine off
    </Location>
    IPCCommTimeout 31
    </VirtualHost> --}}
