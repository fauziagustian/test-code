// package main

// import (
// 	"fmt"
// 	"pertama/multiply"
// )

// func main() {
// 	fmt.Println("Test print")
// 	//result := calculation.Add(8, 9)
// 	result := multiply.Add(8, 9)
// 	//username := username.Add(johnuzi)
// 	fmt.Println(result)
// }

package main

import "fmt"

func main() {
	// score := 80
	//var kelipatan string

	for i := 3; i <= 30; i++ {
		if (i%3 == 0) && (i%7 == 0) {
			fmt.Println("Z")
		}
		if (i%3 == 0) || (i%7 == 0) {
			fmt.Println(i)
		}
	}

}
