#!/bin/bash

IFS=' ' read -r -a boxs <<< $(sudo docker ps |grep php)
sudo docker exec -i -t "${boxs[0]}" /bin/bash
