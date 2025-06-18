### 📦 Step 0 — Install Git (if not already installed)

Run the following command based on your Linux distribution:

#### For Debian/Ubuntu:

```sudo apt update```
```sudo apt install git```

#### For CentOS

```sudo yum install git```

#### For Fedora 

```sudo dnf install git```

#### For Arch Linux

```sudo pacman -S git```

## 📂 Installing Directly to /var/www (NGINX)

If you want to install DevCMS directly to your NGINX web directory:

### Option A — Without Cloning (Make sure you have git installed):
# Note if you don't have install installed on VPS run this. 
1. ```cd /var/www```
2. ```sudo git init```
3. ```sudo git remote add origin https://github.com/chunk082/DevCMS.git```
4. ```sudo git pull origin prod```
NOTE: Do not use the main branch!

## Setting Up Database 

1. ``` cd /var/www/ ```
2. ``` nano .env ```
3. Fill out the blank stuff. If you don't use Discord Ignore it.

# Setting Up Emulator

If you are using MorningStar on the same VPS (No need to to Remote MySQL)

1. 

