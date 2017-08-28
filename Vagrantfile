VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "DreiWolt/devops007"
  config.vm.network :private_network, ip: "192.168.3.19"
  config.vm.hostname = "Benchmarks"
  config.hostsupdater.aliases = ["dev.php-mq-benchmarks.de", "pma.php-mq-benchmarks.de", "readis.php-mq-benchmarks.de"]
  config.vm.synced_folder ".", "/vagrant", type: "nfs"
  config.vm.provision "shell", path: "env/bootstrap.sh", run: "always"

end
