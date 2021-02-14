
![](https://github.com/Isutzu/notes/blob/master/images/ruby-logo.png?raw=true)
## Ruby installation

**rvm** and **rbenv** are Ruby version managers that allows you to install  different versions of ruby and assign a specific ruby version to your project  and also use specific gems.

*rbenv* is more popular and easier to use than rvm.


**Installing Ruby with rbenv**

``$ brew install rbenv`` install the *rbenv* version manager.

``rbenv install -l`` list all ruby version ready for installing.

`` rbenv install 2.3.5``  install this specific version of ruby.

`` rbenv rehash`` run this command every time we install a new version of  ruby or a new gem that provides new commands to the command line.

``rbenv versions`` list all  version of ruby installed in the computer.

``rbenv global 2.3.5`` switch to this version of ruby or use it as the default version for all projects.

```
oscar~\> ruby -v
ruby 2.3.3p222 (2016-11-21 revision 56859) [universal.x86_64-darwin17]
oscar~\> rbenv global 2.3.5
oscar~\> rbenv versions
  system
* 2.3.5 (set by /Users/oscar/.rbenv/version)

```

Notice in the output above that the previous default version was 2.3.3 (*.p222* specifies the patch version), now the default version is 2.3.5

`` rbenv local 2.3.3`` run this in the root of your project to use this specific version for your project.

``rbenv uninstall 2.3.1`` uninstall this version of ruby.

**Installing Ruby with rvm**
```
`` rvm install ruby-2.3.5`` install this version of ruby

``rvm list`` list all ruby versions installed.

``rvm use ruby-2.3.5`` switch to this specific version of ruby.  We can configure a project folder to work with a specifically version of ruby.
```
<br>

## RubyGems

It is a package manager. Gems just ruby code that are packaged for easy distribution. Rails is an example of a gem. A complete list of all ruby gems can be found at [rubygems.org](rubygems.org)

``gem list`` list all gems installed.

``gem update --system`` update all gems.

``gem install rails --version 5.0.0 --no-ri --no-rdoc`` install rails without documentation.


Rails comes with a built in web server called Puma

`` brew install mysql`` install mysql

`` mysql.server start`` start the database

``mysql.server stop `` stop database

``brew services start mysql`` keep runs mysql in the background

``mysql -uroot`` connect to database as root user

``mysql_secure_installation`` for setting a password for root user ,remove anonymous user, etc.

``gem install mysql2`` ruby gem to make work ruby with mysql

<br>

### Books
[Ruby- The Pragmatic Programmer](http://ruby-doc.com/docs/ProgrammingRuby/)
