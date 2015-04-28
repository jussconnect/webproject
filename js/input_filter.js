function valid(f) {
!(/^[A-z&#209;&#241;0-9-\s\?\.\,\\\/\:\%!@"\'\(\)]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z&#209;&#241;0-9-\s\?\.\,\\\/\:\"\'\(\)]/ig,''):null;
} 
