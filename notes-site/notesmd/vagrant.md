![](https://github.com/Isutzu/notes/blob/master/images/vagrant-logo.png?raw=true)
## Vagrant
Vagrant is a tool to manage virtual boxes.We can built different environments to test our applications and all members of our team run the same configuration avoiding incompatibility issues with local software. Vagrant runs in command line , theres s no GUI.

`vagrant.ini` Creates the file **Vagrantfile** in the root of our folder project. From this file we ca specify what sotware('provisions') to install

`vagrant box add ubuntu/trusty64` Add a virtual machine running ubuntu server( see cloud.vagrant for a list of boxes). we can use the same box for multiple projects . This base box will not be modified. We can store our boxes in one folder and our projects in a different folder. To use a specific box just modifiy the Vagrant file of the project.
Boxes are download to `~/.vagrant.d/boxes`

`vagrant up` start the virtual machine in the background.

`vagrant ssh` connects to virtual machine. we can issue commands trough command line.
