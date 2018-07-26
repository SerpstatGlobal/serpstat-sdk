#!/bin/bash

IFS=' ' read -r -a boxs <<< $(docker ps |grep serpstat_sdk)
docker exec -i -t "${boxs[0]}" /bin/bash
