FROM docker:latest
RUN apk add --no-cache curl
RUN curl https://raw.githubusercontent.com/helm/helm/main/scripts/get-helm-3 | DESIRED_VERSION=v3.12.0 bash
