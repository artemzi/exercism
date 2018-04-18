// Package bob should have a package comment that summarizes what it's about.
// https://golang.org/doc/effective_go.html#commentary
package bob

import (
	"strings"
	"unicode"
)

// Hey should have a comment documenting it.
func Hey(remark string) string {
	tr := strings.TrimSpace(remark)
	if tr == "" {
		return "Fine. Be that way!"
	}

	l := tr[len(tr)-1:]

	if isShouting(tr) && !isInt(tr) {
		if l == "?" {
			if !isLetter(tr[:len(tr)-1]) {
				return "Sure."
			}
			return "Calm down, I know what I'm doing!"
		}

		return "Whoa, chill out!"
	}

	if l == "?" {
		return "Sure."
	}

	return "Whatever."
}

func isShouting(line string) bool {
	for i := 0; i <= 1; i++ {
		if unicode.IsLower(rune(line[i])) {
			return false
		}
	}

	return true
}

func isInt(s string) bool {
	for _, c := range s {
		if c == rune(',') ||
			c == rune(' ') ||
			c == rune('?') ||
			c == rune('!') ||
			c == rune('\t') {
			continue
		}
		if !unicode.IsDigit(c) {
			return false
		}
	}
	return true
}

func isLetter(s string) bool {
	for _, r := range s {
		if r == rune(',') ||
			r == rune(' ') ||
			r == rune('?') ||
			r == rune('!') ||
			r == rune('\t') {
			continue
		}
		if !unicode.IsLetter(r) {
			return false
		}
	}
	return true
}
