## SSH
With SSH we can connect to the server terminal, issue commands, install programs, make configurations just like we were sitting in front of the server terminal.

Running the command `ssh-keygen` in the terminal will create in the .ssh firectory the id_rsa and id_rsa.pub files  which contains the private and public key  respectively  Private key should never be shared to avoid a men in the middle attack.

**known_hosts** file is located in the client(local) machine and contains the list of public keys of the servers we have connected to.

**authorized_keys** file is located in the server(remote) machine and contains the public keys of the clients that have stablished a connection

### Connecting to Server without entering a password
To connect to a server without entering the password every time just copy the your public key (id_rsa.pub)  in the authorized_keys file of the remote server . If the file does not exists just create it.

### Resources
- [setting ssh passphrases](https://help.github.com/articles/working-with-ssh-key-passphrases/)

- [ssh config file](https://mediatemple.net/community/products/grid/204644730/using-an-ssh-config-file)

- [create an additional known host entry](https://superuser.com/questions/416246/generating-known-host-entry)

- [known_hosts and authorized_keys](https://unix.stackexchange.com/questions/42643/ssh-key-based-authentication-known-hosts-vs-authorized-keys)
- [difference between known_hosts and authorized_keys](https://security.stackexchange.com/questions/20706/what-is-the-difference-between-authorized-keys-and-known-hosts-file-for-ssh)

- [Video demo: learnCode.academy youtube channel](https://youtu.be/DbPDraCYju8)

- [Understanding the SSH Encryption and Connection Process](https://www.digitalocean.com/community/tutorials/understanding-the-ssh-encryption-and-connection-process#how-does-ssh-work)




</br></br></br>


## Bash prompt customization </br>

on Mac open the .bash_profile in the home directory and add the PS1 shell variable. PS1 variable controls the prompt and it is configured before accepting any commands

- [Youtube video tutorial from Corey Schafer ](https://youtu.be/LXgXV7YmSiU)
