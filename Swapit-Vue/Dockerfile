FROM node:lts-alpine

WORKDIR /usr/src/app/Swapit-Vue

COPY package*.json ./

RUN yarn install

EXPOSE 8080

CMD ["sh", "-c", "yarn install; yarn serve"]
