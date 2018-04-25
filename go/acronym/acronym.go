// Package acronym should have a package comment that summarizes what it's about.
// https://golang.org/doc/effective_go.html#commentary
package acronym

import (
	"strings"
)

// Abbreviate should have a comment documenting it.
func Abbreviate(s string) string {
	var r string

	for _, w := range strings.Fields(strings.Replace(s, "-", " ", -1)) {
		r += strings.ToUpper(string(w[0]))
	}

	return r
}
