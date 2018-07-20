package main

import (
	"fmt"

	"github.com/gin-gonic/gin"
	"github.com/jinzhu/gorm"
	_ "github.com/jinzhu/gorm/dialects/sqlite"
)

var db *gorm.DB
var err error

type Person struct {
	ID         uint   "json:\"id\""
	ItemName   string "json:\"itemname\""
	ItemNum    string  "json:\"itemNum\""
	KeeperName string "json:\"keepername\""
}

func main() {
	db, err = gorm.Open("sqlite3", "./gorm.db")
	if err != nil {
		fmt.Println(err)
	}

	defer db.Close()

	db.AutoMigrate(&Person{})

	r := gin.Default()
	r.GET("/api/inventory", GetInventory)
	r.POST("/api/addInventory", AddInventory)
	r.Run(":3001")

}
func GetInventory(c *gin.Context) {

	var people []Person
	if err := db.Find(&people).Error; err != nil {
		c.AbortWithStatus(404)
		fmt.Println(err)
	} else {
		c.JSON(200, people)
	}
}

func AddInventory(c *gin.Context) {
	var person Person
	c.BindJSON(&person)

	db.Create(&person)
	// c.JSON(200)
}
