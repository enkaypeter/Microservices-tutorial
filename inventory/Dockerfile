FROM golang:1.8

WORKDIR /go/src/app
COPY . .

RUN go get -d -v ./...
RUN go install -v ./...

RUN go get github.com/codegangsta/gin
RUN go get github.com/mattn/go-sqlite3
RUN go get github.com/jinzhu/gorm/dialects/sqlite
RUN go get github.com/gin-gonic/gin

ENV PORT 8080

EXPOSE 3000


CMD gin run
