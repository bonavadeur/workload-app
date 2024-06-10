#!/bin/bash

docker run -d --name workload -p 28080:8080 bonavadeur/workload-app:latest
