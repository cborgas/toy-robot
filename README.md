# cborgas/toy-robot
Simulation of a toy robot moving on a square tabletop

## Description
- The application is a simulation of a toy robot moving on a square 5 by 5 unit tabletop.
- The robot can be placed, moved or oriented on the tabletop.
- Any movement that would result in the robot falling from the table will be prevented, 
  however further valid movement commands will be allowed.

## Commands
See [examples](docs/EXAMPLES.md)
- `PLACE` will put the toy robot on the table in position X,Y and facing NORTH,
  SOUTH, EAST or WEST. This is the first valid command to the robot is a `PLACE` command, 
  after that, any sequence of commands can be issued, in any order, including another `PLACE`
  command. E.g. `PLACE 1,3,SOUTH`. Any place command that would cause the robot to fall will be ignored.
- `MOVE` will move the toy robot one unit forward in the direction it is
  currently facing. Any move that would cause the robot to fall will be ignored.
- `LEFT` or `RIGHT` will rotate the robot 90 degrees in the specified direction
  without changing the position of the robot.
- `REPORT` will announce the X Coordinate,Y Coordinate and the direction of the robot to the CLI.


## How to
1. Clone or download the project
2. Install dependencies with composer
3. Create a file with a command on each line
4. Run the application with a specified file path from the root directory
    ```shell script
    $ ./toy-robot run-from-file /path/to/your/file
    ```
