# Examples
---
Input
```
PLACE 0,0,NORTH
MOVE
REPORT
```

Output
```
0,1,NORTH
```

---
Input
```
PLACE 0,0,NORTH
LEFT
REPORT
```

Output
```
0,0,WEST
```

---
Input
```
PLACE 1,2,EAST
MOVE
MOVE
LEFT
MOVE
REPORT
```

Output
```
3,3,NORTH
```

---
Input
```
PLACE 0,0,SOUTH
MOVE
MOVE
RIGHT
MOVE
MOVE
LEFT
LEFT
MOVE
MOVE
MOVE
LEFT
MOVE
REPORT
```

Output
```
3,1,NORTH
```
